<?php

namespace tt\Controllers;

class ContactsController extends BaseController
{
   public $title = "Наши контакты";
   public function __construct()
   {
      $this->view = "src/views/contactsView.php";
      parent::__construct();
   }
}
