<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class CatController extends BaseController
{
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/views/catView.php";
      parent::__construct($dataProvider);
   }
}
