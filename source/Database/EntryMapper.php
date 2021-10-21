<?php

namespace Backend\Database;

use Exception;

class EntryMapper
{
    /** @var EntryRepository */
    private $entryRepository;

    /**
     * @param EntryRepository $entryRepository
     */
    public function __construct(EntryRepository $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    /**
     * @param int $id
     * @return Entry
     */
    public function findOneById(int $id): Entry
    {
        return $this->entryRepository->findOneById($id);
    }

    /**
     * @param Entry $payload
     */
    public function persist(Entry $payload): void
    {
        try {
            $entry = $this->entryRepository->findOneById($payload->getId());
            $entry->setName($payload->getName());
            $entry->setContent($payload->getContent());
            $entry->setEntryDate($payload->getEntryDate());
            $this->entryRepository->persist($entry);
        } catch (Exception $exception) {
            $this->entryRepository->persist($payload);
        }
    }


}