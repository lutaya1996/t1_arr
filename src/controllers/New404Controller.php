<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class New404Controller extends BaseController
{
    /**
     * @var string
     */
   private const DEFAULT_ERROR_PAGE = "src/Views/new404.php";

    /**
     * @param DataProvider $dataProvider
     */
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = self::DEFAULT_ERROR_PAGE;
      parent::__construct($dataProvider);
   }
}
