<?php

namespace tt\Routes;

use tt\Helpers\Printer;

const DEFAULT_ERROR_PAGE = 'src/views/404.php';

class Router
{
   private $routs;
   private string $errorPagePath;

   /**
    * array[string]string
    */
   public function __construct($routes)
   {
      $this->routs = $routes;
      $this->errorPagePath = DEFAULT_ERROR_PAGE;
   }

   public function setErrorPage($path)
   {
      $this->errorPagePath = $path;
   }

   //
   public function run()
   {
   
      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

      if (!array_key_exists($uri, $this->routs)) {
         require $this->errorPagePath;
         die();
      }

      require $this->routs[$uri];
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
