<?php

namespace tt\Controllers;

use tt\Models\Article;
use tt\DataProvider\DataProvider;

class ArticlesController extends BaseController
{
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/views/articlesView.php";

      parent::__construct($dataProvider);
   }
}
