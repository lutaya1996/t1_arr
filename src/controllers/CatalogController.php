<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class CatalogController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/catalogView.php";
        parent::__construct($dataProvider);
    }
}
