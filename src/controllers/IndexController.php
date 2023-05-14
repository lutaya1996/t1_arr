<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class IndexController extends BaseController
{
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/views/indexView.php";
      parent::__construct($dataProvider);
   }
}
