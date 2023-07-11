<?php

namespace tt\DataProvider;

use PDO;

class ArticleProvider
{

    /** @var PDO */
    public PDO $connection;
    public Database $database;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->connection = $database->getConnection();
        $this->database = $database;
    }

    /**
     * @param string $url_key
     * @return array
     */
    public function getArticleByUrlKey(string $url_key): array
    {
        $statement = $this->connection->prepare("SELECT * FROM article WHERE url_key = :url_key");
        $statement->execute([
            "url_key" => $url_key
        ]);

        $result = $statement->fetchAll();

        return $result[0];
    }

    /**
     * @return array
     */
    public function getArticles(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM article ");
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;

    }

    /**
     * @param array $values
     * @return void
     */
    public function updateConcreteArticle(array $values)
    {
        $statement = $this->connection->prepare(
            "UPDATE article SET url_key = :url_key, active = :active, image = :image, title = :title,
        content = :content, published_date = :published_date, author = :author, tag = :tag 
        WHERE id = :id AND (url_key NOT LIKE :url_key OR active NOT LIKE :active OR image NOT LIKE :image 
        OR title NOT LIKE :title OR content NOT LIKE :content OR published_date NOT LIKE :published_date
        OR author NOT LIKE :author OR tag NOT LIKE :tag )");

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

    /**
     * @param array $values
     * @return void
     */
    public function articleCreate(array $values)
    {

        $statement = $this->connection->prepare(
            "INSERT INTO article SET  url_key = :url_key,active = :active, image = :image, title = :title,
        content = :content,published_date = :published_date,author = :author, tag = :tag");

        $statement->execute(
            [
                "url_key" => $values["url_key"],
                "active" => $values["active"],
                "image" => $values["image"],
                "title" => $values["title"],
                "content" => $values["content"],
                "published_date" => $values["published_date"],
                "author" => $values["author"],
                "tag" => $values["tag"]
            ]
        );
    }
}