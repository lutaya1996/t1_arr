<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class LogoutController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/logoutView.php";
        parent::__construct($dataProvider);
    }
}
