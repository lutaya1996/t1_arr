<?php
namespace tt\DataProvider;

class ArticleProvider
{

    /** @var \PDO  */
    public \PDO $connection;
    public $database;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->connection = $database->getConnection();
        $this->database = $database;
    }

    public function getArticleByUrlKey(int $id): array
    {
        $statement = $this->connection->prepare("SELECT * FROM article WHERE id = :id");
        $statement->execute([
            "id" => $id
        ]);

        $result = $statement->fetchAll();

        return $result[0];
    }

}