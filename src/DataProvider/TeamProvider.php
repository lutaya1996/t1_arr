<?php

namespace tt\DataProvider;

use tt\Models\Team;

class TeamProvider
{

    /** @var \PDO */
    public \PDO $connection;
    public Database $database;
    /** @var Team[] */
    public array $teamMembers;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        session_start();
        $this->connection = $database->getConnection();
        $this->database = $database;
        $this->teamMembers = [];
    }

    /**
     * @return array|Team[]
     */
    public function getTeamMembers(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM team");
        $statement->execute();

        $result = $statement->fetchAll();

        $this->createTeamMembers($result);

        return $this->teamMembers;
    }

    /**
     * @param array $values
     * @return void
     */
    private function createTeamMembers(array $values)
    {
        foreach ($values as $teamMembersValues)  {

            $this->teamMembers[] = new Team(
                $teamMembersValues["image"],
                $teamMembersValues["name"],
                $teamMembersValues["position"],

            );
        }
    }
}
