<?php

namespace tt\App;

use tt\Routes\Router;

class Main
{
   public static function run()
   {
      $router = new Router([
         '/' => 'src/views/indexView.php',
         '/cat' => 'src/views/catView.php',
         '/articles' => 'src/views/articlesView.php',
         '/contacts' => 'src/views/contactsView.php',
      ]);
      $router->setErrorPage('src/views/nakhuiView.php');
      //$router->setErrorPage('src/views/new404.php');

      $router->run();
   }
}
