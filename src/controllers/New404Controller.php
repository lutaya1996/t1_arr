<?php

namespace tt\Controllers;


class New404Controller extends BaseController
{
   private const DEFAULT_ERROR_PAGE = 'src/views/new404.php';
   public function __construct()
   {
      $this->view = self::DEFAULT_ERROR_PAGE;
      parent::__construct();
   }
}
