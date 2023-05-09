<?php

namespace tt\Routes;

use tt\Helpers\Printer;
use tt\Controllers\BaseController;
use tt\Controllers\ErrorController;
use tt\Controllers\New404Controller;

class Router
{
   // Храним хеш-таблицу с uri  в виде ключей и роутами в виде значений
   /**
    * @var array[string]BaseController
    */
   private $routs;

   // Храним путь до фала который будем подключать через
   // require и тем самым отображать
   private BaseController $errorPagePath;

   /**
    * array[string]string
    */
   public function __construct($routes)
   {
      // в переменную помещаем хештаблицу(ассоциативный массив или мапа)
      $this->routs = $routes;
      // по умолчанию устанавливаем страницу для ошибки из константы
      $this->errorPagePath = new ErrorController();
   }

   // метод который позволяет переобпределимть страцицу ошибок
   public function setErrorPage(BaseController $path)
   {
      $this->errorPagePath = $path;
   }

   // Run - основной блок логики приложения
   public function run()
   {
      // получаем uri запроса
      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

      // Ищем uri в зарегестрированных роутах
      if (!array_key_exists($uri, $this->routs)) {
         //  если не нашли роут в наших зарегестрированных роутах, то
         // отображаем страцу ошибки
         $this->errorPagePath->setUri($uri);
         $this->errorPagePath->render();

         // После отображения страницы
         // логика больше не нужна, поэтому закрываем скрипт
         die();
      }

      // Если uri есть в зарегестрированных роутах
      // то отображем нормальную страницу из зарегестрированных
      $this->routs[$uri]->setUri($uri);
      $this->routs[$uri]->render();
   }
}
