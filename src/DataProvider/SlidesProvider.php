<?php

namespace tt\DataProvider;

use tt\Models\Slide;

class SlidesProvider
{

    /** @var \PDO */
    public \PDO $connection;
    public Database $database;
    /** @var Slide[] */
    public array $slides;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        session_start();
        $this->connection = $database->getConnection();
        $this->database = $database;
        $this->slides = [];
    }

    /**
     * @return array|Slide[]
     */
    public function getSlides(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM slides");
        $statement->execute();

        $result = $statement->fetchAll();

        $this->createSlides($result);

        return $this->slides;
    }

    /**
     * @param array $values
     * @return void
     */
    private function createSlides(array $values)
    {
        foreach ($values as $slideValues)  {

            $this->slides[] = new Slide(
                $slideValues["image"],
                $slideValues["first_head"],
                $slideValues["second_head"],
                $slideValues["third_head"],
                $slideValues["show_on_first"],
            );
        }
    }
}
