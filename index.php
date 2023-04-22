<?php

function beautifulP(mixed $val)  
{
   echo '<pre>';
   var_dump($val);
   echo  "</pre>";
}

class Main
{
   public Router $router;

   public function __construct(Router $router)
   {
      $this->router = $router;
   }

   public function run()
   {
     
      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
      beautifulP($_SERVER);
      // $this->router->route($uri);
     
   }
}



class Router
{
   public $templatePath = "templates";

   public $routes = [
      "/about" => "about.html",
      "/p" => "pidora.html",
      "404" => "404.html",
      "/" => "index.html",
      "/index" => "index.html"
   ];

   /**
    *  Ebuchiy router
    */
   public function route(string $uri)
   {
      if (!array_key_exists($uri, $this->routes)) {
         echo file_get_contents($this->templatePath . DIRECTORY_SEPARATOR . $this->routes["404"]);
         beautifulP($_SERVER);
         die();
      }

      echo file_get_contents($this->templatePath . DIRECTORY_SEPARATOR . $this->routes[$uri]);
   }
}


$router = new Router();

$main = new Main($router);

$main->run();
