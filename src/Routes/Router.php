<?php

namespace tt\Routes;

use tt\Helpers\Printer;

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
         Printer::beautifulP($_SERVER);
         die();
      }

      echo file_get_contents($this->templatePath . DIRECTORY_SEPARATOR . $this->routes[$uri]);
   }
}
