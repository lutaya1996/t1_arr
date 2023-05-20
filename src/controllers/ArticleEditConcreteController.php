<?php
namespace tt\controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;

class ArticleEditConcreteController extends  BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        //$this->view = "src/views/articleCreateView.php";

        parent::__construct($dataProvider);
    }
    public function render(array $param)
    {
        echo "sdsdsds";
        Printer::beautifulP($param);

        //require $this->view;
    }
}