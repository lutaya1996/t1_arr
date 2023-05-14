<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class ArticlesEditController extends BaseController
{
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/views/articlesEditView.php";

      parent::__construct($dataProvider);
   }
}
