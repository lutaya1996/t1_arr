<?php

namespace tt\DataProvider;

use tt\Models\Author;

class AuthorsProvider
{

    /** @var \PDO */
    public \PDO $connection;
    public Database $database;
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

    /**
     * @return array|Author[]
     */
    public function getAuthors(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM authors");
        $statement->execute();

        $result = $statement->fetchAll();

        $this->createAuthors($result);

        return $this->authors;
    }

    /**
     * @param array $values
     * @return void
     */
    private function createAuthors(array $values): void
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
