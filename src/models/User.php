<?php

namespace tt\Models;

class User
{
    /** @var int */
    public int $id;
    /** @var string */
    public string $name;
    /** @var string */
    public string $email;
    /** @var string */
    public string $password;


    /**
     * @param $id
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
