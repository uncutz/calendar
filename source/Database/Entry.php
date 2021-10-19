<?php declare(strict_types=1);

namespace Backend\Database;

class Entry
{
    /** @var int|null */
    private $id;
    /** @var string */
    private $name;
    /** @var  */
    private $content;
    private $entryDate;
    private $createdAt;
}