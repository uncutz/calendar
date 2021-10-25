<?php declare(strict_types=1);

namespace Backend\Database;


use DateTime;

class Entry
{
    /** @var int|null */
    private $id;
    /** @var string */
    private $name;
    /** @var string|null */
    private $content;
    /** @var string|null */
    private $type;
    /** @var DateTime */
    private $entryDate;
    /** @var DateTime */
    private $createdAt;

    /**
     * @param int|null $id
     */
    public function __construct(?int $id)
    {
        $this->id = $id;
        $this->createdAt = new DateTime();
    }

    /**
     * @param array $record
     * @return self
     */
    public static function constructFromRecord(array $record): self
    {
        $entry = new self((int)$record['id']);
        $entry->setName($record['name']);
        $entry->setEntryDate(DateTime::createFromFormat('Y-m-d H:i:s', $record['entry_date']));

        if ($record['content']) {
            $entry->setContent($record['content']);
        }

        if ($record['type']) {
            $entry->setType($record['type']);
        }

        $createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $record['created_at']);
        if (!$createdAt) {
            throw new \LogicException('date could not be read');
        }
        $entry->createdAt = $createdAt;

        return $entry;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }


    /**
     * @return DateTime
     */
    public function getEntryDate(): DateTime
    {
        return $this->entryDate;
    }

    /**
     * @param DateTime $entryDate
     */
    public function setEntryDate(DateTime $entryDate): void
    {
        $this->entryDate = $entryDate;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }


}