<?php

require __DIR__ . '/vendor/autoload.php';

use tt\Routes\Router;
use tt\App\Main;
use tt\Helpers\Printer;

$router = new Router();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
Printer::beautifulP($uri);
$router->route($uri);


// $main = new Main();

// $main->pechat();
