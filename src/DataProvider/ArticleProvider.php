<?php

namespace tt\DataProvider;

class ArticleProvider
{

    /** @var \PDO */
    public \PDO $connection;
    public $database;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        session_start();
        $this->connection = $database->getConnection();
        $this->database = $database;
    }

    public function getArticleByUrlKey(string $url_key): array
    {
        $statement = $this->connection->prepare("SELECT * FROM article WHERE url_key = :url_key");
        $statement->execute([
            "url_key" => $url_key
        ]);

        $result = $statement->fetchAll();

        return $result[0];
    }

    public function getArticles(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM article ");
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;

    }

    public function updateConcreteArticle(array $values)
    {
        $statement = $this->connection->prepare(
            "UPDATE article SET  url_key = :url_key,active = :active, image = :image, title = :title,
        content = :content,published_date = :published_date,author = :author, tag = :tag WHERE id = :id");

        $statement->execute(
            [
                "url_key" => $values["url_key"],
                "active" => $values["active"],
                "image" => $values["image"],
                "title" => $values["title"],
                "content" => $values["content"],
                "published_date" => $values["published_date"],
                "author" => $values["author"],
                "tag" => $values["tag"],
                "id" => $values["id"]
            ]
        );
    }
}