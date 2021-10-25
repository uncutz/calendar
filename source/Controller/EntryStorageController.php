<?php

namespace Backend\Controller;

use Backend\Connection;
use Backend\Database\Entry;
use Backend\Database\EntryMapper;
use Backend\Database\EntryRepository;
use DateTime;

class EntryStorageController
{
    /**
     * @throws \JsonException
     */
    public function save(): void
    {
        $receivedEntry = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
        if ($receivedEntry) {
            $pdo = (new Connection())->getPdo();
            $entryMapper = new EntryMapper(new EntryRepository($pdo));
            $entry = new Entry((int)$receivedEntry['id']);
            $entry->setName($receivedEntry['name']);
            $entry->setContent($receivedEntry['content']);
            $entry->setEntryDate(DateTime::createFromFormat('Y-m-d', $receivedEntry['date']));
            $entry->setType($receivedEntry['type']);
            $entryMapper->persist($entry);

            echo json_encode([
                'success' => true,
                'entry' => [
                    'id' => $entry->getId(),
                    'name' => $entry->getName(),
                    'content' => $entry->getContent(),
                    'entryDate' => $entry->getEntryDate()->format('Y-m-d H:i:s'),
                    'type' => $entry->getType()
                ],
            ], JSON_THROW_ON_ERROR);
        }
    }
}