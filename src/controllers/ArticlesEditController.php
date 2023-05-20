<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;


class ArticlesEditController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/views/articlesEditView.php";

      parent::__construct($dataProvider);
   }

   // метод, подключающий нужную вьюшку
   public function render(array $param)
   {
//      Printer::beautifulP($_POST);
      if (!empty($_POST) && is_array($_POST)) {
//          var_dump($_POST);
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
            $requestArticles[$id] = new Article($id, "", "", "", false);
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
            case "active":
                 $requestArticles[$id]->active = true;
         }
      }

      foreach ($requestArticles as $value) {
         $this->dataProvider->updateArticle($value);
      }

      header('Location: /articles');
   }
}
