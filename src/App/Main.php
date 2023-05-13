<?php

namespace tt\App;

use tt\Controllers\ArticlesController;
use tt\Controllers\CatController;
use tt\Controllers\ContactsController;
use tt\Controllers\IndexController;
use tt\Controllers\New404Controller;
use tt\DataProvider\DataProvider;
use tt\Routes\Router;

class Main
{
   public static function run()
   {
      $dataProvider = new DataProvider();
      // Создаем объект класса Roиter и при этом вызывается
      // конструктор
      $router = new Router([
         '/' => new IndexController($dataProvider),
         '/cat' => new CatController($dataProvider),
         '/articles' => new ArticlesController($dataProvider),
         '/contacts' => new ContactsController($dataProvider),
      ]);

      // Вызываем метод объекта класса Router для переопределния 
      // страницы ошибки
      // $router->setErrorPage('src/views/nakhuiView.php');
      $router->setErrorPage(new New404Controller($dataProvider));

      // Вызываем метод объекта класса Router для отображения страницы
      $router->run();
   }
}
