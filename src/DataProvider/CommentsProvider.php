<?php

namespace tt\DataProvider;

use tt\Models\Comment;

class CommentsProvider
{

    /** @var \PDO */
    public \PDO $connection;
    public $database;
    /** @var Comment[] */
    public array $comments;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        session_start();
        $this->connection = $database->getConnection();
        $this->database = $database;
        $this->comments = [];
    }

    public function getComments()
    {
        $statement = $this->connection->prepare("SELECT * FROM comments");
        $statement->execute();

        $result = $statement->fetchAll();

        $this->createComments($result);

        return $this->comments;
    }

    private function createComments(array $values)
    {
        foreach ($values as $commentValues)  {

            $this->comments[] = new Comment(
                $commentValues["id"],
                $commentValues["image"],
                $commentValues["user_name"],
                $commentValues["published_date"],
                $commentValues["text"],
            );
        }
    }
}
