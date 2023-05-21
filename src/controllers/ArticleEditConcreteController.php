<?php
namespace tt\controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;

use const tt\DataProvider\KEY_ARTICLES;

class ArticleEditConcreteController extends  BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        // $this->view = "src/views/concreteArticleEditView.php";

        parent::__construct($dataProvider);
    }
    public function render(array $param)
    {
        // echo "sdsdsds";
        // Printer::beautifulP($param);
        // Printer::beautifulP($_SESSION[KEY_ARTICLES]);
        foreach($this->dataProvider->getArticles() as $article)  {
            if ($param["id"] == $article->id) {
                require "src/views/concreteArticleEditView.php";
        }
        
        }
        require "src/views/nakhuiView.php";

        //require $this->view;
    }
}