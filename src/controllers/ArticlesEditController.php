<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;

use function PHPSTORM_META\type;

class ArticlesEditController extends BaseController
{
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/views/articlesEditView.php";

      parent::__construct($dataProvider);
   }

   // метод, подключающий нужную вьюшку
   public function render()
   {
      // Printer::beautifulP($_POST);
      if (!empty($_POST) && is_array($_POST)) {
         $this->updateArticles($_POST);
         return;
      }

      require $this->view;
   }

   private function updateArticles($request)
   {
      // Пустой массив содержит приходящие модели
      // Ключ массива будет id
      // Значение Моделька
      $requestArticles = [];
      foreach ($request as $key => $value) {
         [$nameField, $numberFieldRaw] = explode("-", $key);

         $id = (int)$numberFieldRaw;

         if (
            !isset($requestArticles[$id])
         ) {
            $requestArticles[$id] = new Article("", "", "", $id);
         }

         switch ($nameField) {
            case "image":
               $requestArticles[$id]->image = $value;
               break;
            case "title":
               $requestArticles[$id]->title = $value;
               break;
            case "description":
               $requestArticles[$id]->description = $value;
               break;
         }
      }

      foreach ($requestArticles as $value) {
         $this->dataProvider->updateArticle($value);
      }

      header('Location: /articles');
   }
}
