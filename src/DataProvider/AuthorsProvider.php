<?php

namespace tt\DataProvider;

use tt\Models\Author;

class AuthorsProvider
{

    /** @var \PDO */
    public \PDO $connection;
    public $database;
    /** @var Author[] */
    public array $authors;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        session_start();
        $this->connection = $database->getConnection();
        $this->database = $database;
        $this->authors = [];
    }

    public function getAuthors()
    {
        $statement = $this->connection->prepare("SELECT * FROM authors");
        $statement->execute();

        $result = $statement->fetchAll();

        $this->createAuthors($result);

        return $this->authors;
    }

    private function createAuthors(array $values)
    {
        foreach ($values as $authorValues) {

            $this->authors[] = new Author(
                $authorValues["id"],
                $authorValues["image"],
                $authorValues["name"],
                $authorValues["profession"],
            );
        }
    }
}
