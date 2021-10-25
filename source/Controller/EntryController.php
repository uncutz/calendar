<?php

namespace Backend\Controller;

use Backend\Connection;
use Backend\Database\Entry;
use Backend\Database\EntryMapper;
use Backend\Database\EntryRepository;

class EntryController
{
    /**
     * @throws \JsonException
     */
    public function index(): void
    {
        $pdo = (new Connection())->getPdo();
        $entryMapper = new EntryMapper(new EntryRepository($pdo));
        $entries = $entryMapper->fetchAll();
        $result = array_map(
            static function (Entry $entries): array {
                return [
                    'id' => $entries->getId(),
                    'name' => $entries->getName(),
                    'content' => $entries->getContent(),
                    'entryDate' => $entries->getEntryDate()->format('Y-m-d H:i:s'),
                    'type' => $entries->getType()
                ];
            }, $entries
        );

        echo json_encode([
            'success' => true,
            'entries' => $result
        ], JSON_THROW_ON_ERROR);
    }
}