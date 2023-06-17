<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class IndexController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/Views/indexView.php";
      parent::__construct($dataProvider);
   }
}
