<?php

namespace tt\Controllers;

use tt\Models\Article;
use tt\DataProvider\DataProvider;

class ArticlesController extends BaseController
{
   public $title = "Мои статьи";
   /**
    * @var array[Article]
    */
   public $previewArticles;

   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/views/articlesView.php";

      $this->previewArticles = [


      ];

      parent::__construct($dataProvider);
   }
}
