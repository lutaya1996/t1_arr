<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class ErrorController extends BaseController
{
   private const DEFAULT_ERROR_PAGE = 'src/views/404.php';
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = self::DEFAULT_ERROR_PAGE;
      parent::__construct($dataProvider);
   }
}
