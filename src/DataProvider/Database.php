<?php

namespace tt\DataProvider;

use InvalidArgumentException;
use PDO;
use PDOException;

class Database
{
    /**
     * @var PDO
     */

     private PDO $connection;

     /**
     * @param string $dsn
     * @param string $username
     * @param string $password
     */
public  function __construct(string  $dsn, string  $username = "", string $password = "")
{
    try{
        $this->connection = new PDO($dsn, $username, $password);
    } catch (PDOException $exception) {
        throw new InvalidArgumentException("Database error:" . $exception->getMessage());
    }

}
}