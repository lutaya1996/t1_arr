<?php

namespace tt\Routes;

use tt\Helpers\Printer;

class Router
{
   public function run()
   {
      $routs = [
         '/' => 'src/views/indexView.php',
         '/cat' => 'src/views/catView.php',
         '/articles' => 'src/views/articlesView.php',
         '/contacts' => 'src/views/contactsView.php',
      ];

      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


      if (!array_key_exists($uri, $routs)) {
         require 'src/views/404.php';
         die();
      }

      require $routs[$uri];
   }
}


// class Router
// {
//    public $templatePath = "assets" . DIRECTORY_SEPARATOR . "templates";

//    public $routes = [
//       "/about" => "about.html",
//       "/p" => "pidora.html",
//       "404" => "404.html",
//       "/" => "index.html",
//       "/index" => "index.html"
//    ];

//    /**
//     *  Ebuchiy router
//     */
//    public function route(string $uri)
//    {

//       if (!array_key_exists($uri, $this->routes)) {
//          echo file_get_contents($this->templatePath . DIRECTORY_SEPARATOR . $this->routes["404"]);
//          Printer::beautifulP($_SERVER);
//          die();
//       }

//       echo file_get_contents($this->templatePath . DIRECTORY_SEPARATOR . $this->routes[$uri]);
//    }
// }
