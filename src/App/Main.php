<?php

namespace tt\App;

use tt\Controllers\ArticleCreateController;
use tt\controllers\ArticleEditConcreteController;
use tt\Controllers\ArticlesController;
use tt\Controllers\ArticlesEditController;
use tt\Controllers\CatController;
use tt\Controllers\ContactsController;
use tt\Controllers\IndexController;
use tt\Controllers\New404Controller;
use tt\DataProvider\DataProvider;
use tt\Routes\Router;


class Main
{
    /**
     * @return void
     */
   public static function run()
   {
      $dataProvider = new DataProvider();

      $router = new Router([
         "/" => new IndexController($dataProvider),
         "/cat" => new CatController($dataProvider),
         "/articles" => new ArticlesController($dataProvider),
         "/articles/edit" => new ArticlesEditController($dataProvider),
         "/contacts" => new ContactsController($dataProvider),
          "/articles/create" => new ArticleCreateController($dataProvider),
          "/\/articles\/edit\/(\d+)/" => new ArticleEditConcreteController($dataProvider)
      ]);

      // Вызываем метод объекта класса Router для переопределния 
      // страницы ошибки
      // $router->setErrorPage('src/Views/nakhuiView.php');
      $router->setErrorPage(new New404Controller($dataProvider));

      // Вызываем метод объекта класса Router для отображения страницы
      $router->run();
   }
}
