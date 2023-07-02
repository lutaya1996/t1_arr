<?php

namespace tt\App;

use tt\Controllers\ArticleCreateController;
use tt\Controllers\ArticleEditConcreteController;
use tt\Controllers\ArticlesController;
use tt\Controllers\ArticlesEditController;
use tt\Controllers\CatalogController;
use tt\Controllers\BlogController;
use tt\Controllers\ContactsController;
use tt\Controllers\IndexController;
use tt\Controllers\LoginController;
use tt\Controllers\LogoutController;
use tt\Controllers\RegisterController;
use tt\Controllers\New404Controller;
use tt\DataProvider\Database;
use tt\DataProvider\DataProvider;
use tt\Helpers\Request;
use tt\Helpers\Session;
use tt\Routes\Router;


class Main
{
    /**
     * @return void
     */
    public static function run()
    {
        //Подключение к БД
        $config = require_once "config/database.php";
        $dsn = $config["dsn"];
        $username = $config["username"];
        $password = $config["password"];
        $database = new Database($dsn, $username, $password);

        $dataProvider = new DataProvider($database);

        $router = new Router([
            "/" => new IndexController($dataProvider),
            "/catalog" => new CatalogController($dataProvider),
            "/contacts" => new ContactsController($dataProvider),
            "/blog" => new BlogController($dataProvider),
            "/articles" => new ArticlesController($dataProvider),
            "/articles/edit" => new ArticlesEditController($dataProvider),
            "/articles/create" => new ArticleCreateController($dataProvider),
            "/\/articles\/edit\/(\d+)/" => new ArticleEditConcreteController($dataProvider),
            "/login" => new LoginController($dataProvider),
            "/register" => new RegisterController($dataProvider),
            "/logout" => new LogoutController($dataProvider)
        ]);

        // Вызываем метод объекта класса Router для переопределния
        // страницы ошибки
        // $router->setErrorPage('src/Views/nakhuiView.php');
        $router->setErrorPage(new New404Controller($dataProvider));

        // Вызываем метод объекта класса Router для отображения страницы
        $router->run();

    }
}
