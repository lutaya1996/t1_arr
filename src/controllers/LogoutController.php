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
        parent::__construct($dataProvider);
    }

    public function  render(array $param)
    {
        $this->session->setData("user", null);
        header("Location: /");
    }

}
