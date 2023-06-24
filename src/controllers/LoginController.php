<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class LoginController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/loginView.php";
        parent::__construct($dataProvider);
    }
}
