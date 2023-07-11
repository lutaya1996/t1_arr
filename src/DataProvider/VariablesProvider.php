<?php

namespace tt\DataProvider;

class VariablesProvider
{

    /** @var \PDO */
    public \PDO $connection;
    public Database $database;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        session_start();
        $this->connection = $database->getConnection();
        $this->database = $database;
    }

    /**
     * @param $key_variable
     * @return mixed
     */
    public function getVariable($key_variable)
    {
        $statement = $this->connection->prepare("SELECT * FROM variables WHERE key_variable = :key_variable");
        $statement->execute([
            "key_variable" => $key_variable
        ]);

        $result = $statement->fetch();

        return $result["value"];
    }
}
