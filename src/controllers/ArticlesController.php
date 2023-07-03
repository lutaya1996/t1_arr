<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class ArticlesController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/articlesView.php";
        parent::__construct($dataProvider);
    }
}
