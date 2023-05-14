<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class ContactsController extends BaseController
{
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/views/contactsView.php";
      parent::__construct($dataProvider);
   }
}
