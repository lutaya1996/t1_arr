<?php

namespace tt\App;

use tt\Routes\Router;

class Main
{
   public static function run()
   {
      // Создаем объект класса Roter и при этом вызывается
      // конструктор
      $router = new Router([
         '/' => 'src/views/indexView.php',
         '/cat' => 'src/views/catView.php',
         '/articles' => 'src/views/articlesView.php',
         '/contacts' => 'src/views/contactsView.php',
      ]);

      // Вызываем метод объекта класса Router для переопределния 
      // страницы ошибки
      $router->setErrorPage('src/views/nakhuiView.php');
      //$router->setErrorPage('src/views/new404.php');

      // Вызываем метод объекта класса Router для отображения страницы
      $router->run();
   }
}
