<?php

use Backend\Connection;
use Backend\Database\Entry;
use Backend\Database\EntryMapper;
use Backend\Database\EntryRepository;

require __DIR__. '/../vendor/autoload.php';

try {
    $receivedEntry = json_decode(file_get_contents('php://input'));
    if ($receivedEntry)
    {

        $pdo = (new Connection())->getPdo();
        $entryMapper = new EntryMapper(new EntryRepository($pdo));
        $entry = new Entry((int)$receivedEntry->id);
        $entry->setName($receivedEntry->name);
        $entry->setContent($receivedEntry->content);
        $entry->setEntryDate(DateTime::createFromFormat('Y-m-d', $receivedEntry->date));
        $entryMapper->persist($entry);
        echo json_encode([
            'success' => true,
            'entry' => $receivedEntry
        ], JSON_THROW_ON_ERROR);
    }

} catch (Exception $exception) {
    var_dump($exception);
}


