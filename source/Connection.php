<?php declare(strict_types=1);


namespace Backend;

use PDO;

class Connection
{

    /** @var PDO */
    private $pdo;
    /** @var string  */
    private $dbname = 'database';
    /** @var string  */
    private $host = 'localhost';
    /** @var string  */
    private $username = 'root';
    /** @var string  */
    private $password = 'root';


    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=". $this->dbname .";host=".$this->host."",
            "". $this->username ."",
            "". $this->password .""
        );
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

}