<?php

namespace tt\App;

use tt\Controllers\ArticlesController;
use tt\Controllers\CatController;
use tt\Controllers\ContactsController;
use tt\Controllers\IndexController;
use tt\Controllers\New404Controller;
use tt\Routes\Router;

class Main
{
   public static function run()
   {
      // Создаем объект класса Roter и при этом вызывается
      // конструктор
      $router = new Router([
         '/' => new IndexController(),
         '/cat' => new CatController(),
         '/articles' => new ArticlesController(),
         '/contacts' => new ContactsController(),
      ]);

      // Вызываем метод объекта класса Router для переопределния 
      // страницы ошибки
      // $router->setErrorPage('src/views/nakhuiView.php');
      $router->setErrorPage(new New404Controller());

      // Вызываем метод объекта класса Router для отображения страницы
      $router->run();
   }
}
