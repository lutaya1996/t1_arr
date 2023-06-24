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
     * @param $image
     * @param $name
     * @param $profession
     */
    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->image = $name;
        $this->name = $email;
        $this->profession = $password;
    }
}
