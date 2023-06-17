<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class ContactsController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
   public function __construct(DataProvider $dataProvider)
   {
      $this->view = "src/Views/contactsView.php";
      parent::__construct($dataProvider);
   }
}
