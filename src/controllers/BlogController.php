<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class BlogController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/blogView.php";
        parent::__construct($dataProvider);
    }
}
