<?php

namespace tt\Controllers;

class CatController extends BaseController
{
   public $title = "Мои котики";
   public function __construct()
   {
      $this->view = "src/views/catView.php";
      parent::__construct();
   }
}
