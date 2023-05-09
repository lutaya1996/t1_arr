<?php

namespace tt\Controllers;


class ErrorController extends BaseController
{
   private const DEFAULT_ERROR_PAGE = 'src/views/404.php';
   public function __construct()
   {
      $this->view = self::DEFAULT_ERROR_PAGE;
      parent::__construct();
   }
}
