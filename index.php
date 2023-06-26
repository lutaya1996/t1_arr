<?php

require __DIR__ . "/vendor/autoload.php";

use tt\App\Main;
use tt\DataProvider\Database;

$config =require_once "config/database.php";
$dsn = $config["dsn"];
$username = $config["username"];
$password = $config["password"];
$database = new Database($dsn, $username, $password);

Main::run();










