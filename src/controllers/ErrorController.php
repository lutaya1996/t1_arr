<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class ErrorController extends BaseController
{
    /**
     * @var string
     */
   private const DEFAULT_ERROR_PAGE = "src/Views/404.php";

    /**
     * @param DataProvider $dataProvider
     */
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = self::DEFAULT_ERROR_PAGE;
      parent::__construct($dataProvider);
   }
}
