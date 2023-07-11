<?php

namespace tt\DataProvider;

use tt\Helpers\Session;
use tt\Models\User;

class UserProvider
{
    /** @var \PDO */
    public \PDO $connection;
    public Database $database;
    public Session $session;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->session = new Session();
        $this->session->start();
        $this->database = $database;
        $this->connection = $database->getConnection();

    }

    /**
     * @param string $value
     * @return mixed
     */
    public function checkUserInDb(string $value)
    {
        $statement = $this->database->getConnection()->prepare(
            "SELECT * FROM users WHERE name = :value or email = :value"
        );

        $statement->execute([
            "value" => $value
        ]);

        $user = $statement->fetch();
        return $user;

    }

    /**
     * @param $name
     * @param $email
     * @param $password
     * @return void
     */
    public function createUser($name, $email, $password)
    {
        $statement = $this->database->getConnection()->prepare(
            "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)"
        );
        $statement->execute([
            "name" => $name,
            "email" => $email,
            "password" => $password
        ]);
    }
}