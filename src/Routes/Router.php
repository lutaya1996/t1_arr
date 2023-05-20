<?php

namespace tt\Routes;

use tt\Helpers\Printer;
use tt\Controllers\BaseController;



class Router
{
   // Указали в доке, что переменная routs должна быть массивом
   // строк и объектов класса BaseController
   /**
    * @var array[string]BaseController
    */
   private $routs;
   private BaseController $errorPagePath;

   public function __construct($routes)
   {
      // в переменную помещаем хештаблицу(ассоциативный массив или мапа)
      $this->routs = $routes;
      // по умолчанию устанавливаем страницу для ошибки путем создания
      // объекта класса ErrorController
      // $this->errorPagePath = new ErrorController();
   }

   // метод который позволяет переопределимть страницу ошибок
   public function setErrorPage(BaseController $path)
   {
      $this->errorPagePath = $path;
   }

   // Run - основной блок логики приложения
   public function run()
   {
      // получаем uri запроса
      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

      foreach ($this->routs as $key => $val) {
          if (strpos($key, "\d")) {
              preg_match_all($key,$uri, $rez);

              if (isset($rez[1][0])) {
                  $this->routs[$key]->setUri($uri);
                  // рендерим нужную страницу
                  $this->routs[$key]->render(["id"=>(int)$rez[1][0]]);
                  die();
              }
          }
      }

      // Ищем uri в зарегестрированных роутах
      if (!array_key_exists($uri, $this->routs)) {
         //  если не нашли роут в наших зарегестрированных роутах, то
         // вызоваем метод установки переменной uri BaseController
         $this->errorPagePath->setUri($uri);
         // рендерим страницу ошибки 
         $this->errorPagePath->render([]);

         // После отображения страницы
         // логика больше не нужна, поэтому закрываем скрипт
         die();
      }

      // Если uri есть в зарегестрированных роутах,
      // то вызываем метод установки $uri того объекта,
      // чей uri найден 
      $this->routs[$uri]->setUri($uri);
      // рендерим нужную страницу
      $this->routs[$uri]->render([]);
   }
}
