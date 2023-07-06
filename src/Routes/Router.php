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
   private array $routs;

   /** @var BaseController  */
   private BaseController $errorPagePath;

    /**
     * @param $routes
     */
   public function __construct($routes)
   {
      // в переменную помещаем хештаблицу(ассоциативный массив или мапа)
      $this->routs = $routes;
      // по умолчанию устанавливаем страницу для ошибки путем создания
      // объекта класса ErrorController
      // $this->errorPagePath = new ErrorController();
   }

   // метод который позволяет переопределимть страницу ошибок

    /**
     * @param BaseController $path
     * @return void
     */
   public function setErrorPage(BaseController $path)
   {
      $this->errorPagePath = $path;
   }

   // Run - основной блок логики приложения

    /**
     * @return void
     */
   public function run()
   {
      // получаем uri запроса
      $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

      /**
       * @var string $key
       * @var BaseController $val
       */
       foreach ($this->routs as $key => $val) {
          if (strpos($key, ".+")) {
              preg_match_all($key,$uri, $res);
           
            //   Printer::beautifulP($key);

              if (isset($res[1][0])) {
                  $this->routs[$key]->setUri($uri);
                  // рендерим нужную страницу
                  $this->routs[$key]->render(["url_key"=>$res[1][0]]);
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
