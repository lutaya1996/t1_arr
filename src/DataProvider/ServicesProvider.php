<?php

namespace tt\DataProvider;

use tt\Models\Service;

class ServicesProvider
{

    /** @var \PDO */
    public \PDO $connection;
    public Database $database;
    /** @var Service[] */
    public array $services;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        session_start();
        $this->connection = $database->getConnection();
        $this->database = $database;
        $this->services = [];
    }

    /**
     * @return array|Service[]
     */
    public function getServices(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM services");
        $statement->execute();

        $result = $statement->fetchAll();

        $this->createServices($result);

        return $this->services;
    }

    /**
     * @param array $values
     * @return void
     */
    private function createServices(array $values)
    {
        foreach ($values as $serviceValues)  {

            $this->services[] = new Service(
                $serviceValues["id"],
                $serviceValues["icon_class"],
                $serviceValues["title"],
                $serviceValues["description"],
            );
        }
    }
}
