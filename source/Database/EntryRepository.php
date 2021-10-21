<?php declare(strict_types=1);

namespace Backend\Database;

use LogicException;
use PDO;

class EntryRepository
{
    /** @var PDO */
    private $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $id
     * @return Entry
     */
    public function findOneById(int $id): Entry
    {
        $statement = $this->pdo->prepare('
                                    SELECT * FROM entry
                                    WHERE id = :id
        ');

        $statement->execute(['id' => $id]);

        $record = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$record) {
            throw new LogicException('entry could not be found');
        }

        return Entry::constructFromRecord($record);
    }

    public function persist(Entry $entry): void
    {
        if (!$entry->getId()) {
            $statement = $this->pdo->prepare('
                                                INSERT INTO entry (name, content, entry_date, created_at)
                                                VALUES (:name, :content, :entry_date, :created_at)
            ');

            $succeeds = $statement->execute([
                'name' => $entry->getName(),
                'content' => $entry->getContent(),
                'entry_date' => $entry->getEntryDate()->format('Y-m-d H:i:s'),
                'created_at' => $entry->getCreatedAt()->format('Y-m-d H:i:s')

            ]);

            if (!$succeeds) {
                throw new LogicException('entry could not be created');
            }
            $entry->setId((int)$this->pdo->lastInsertId('entry'));
        } else {
            $statement = $this->pdo->prepare('
                                                UPDATE entry 
                                                SET name = :name, content = :content, entry_date = :entry_date
                                                WHERE id = :id
                                                ');
            $succeeds = $statement->execute([
                'name' => $entry->getName(),
                'content' => $entry->getContent(),
                'entry_date' => $entry->getEntryDate()->format('Y-m-d'),
                'id' => $entry->getId()
            ]);

            if (!$succeeds) {
                throw new LogicException('entry could not be updated');
            }
        }
    }

}