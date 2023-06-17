<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class CatController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/Views/catView.php";
      parent::__construct($dataProvider);
   }
}
