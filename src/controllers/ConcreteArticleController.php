<?php

namespace tt\Controllers;

use tt\DataProvider\ArticleProvider;
use tt\DataProvider\DataProvider;
use tt\Models\Article;

class ConcreteArticleController extends BaseController
{
    /** @var Article */
    public Article $article;

    /** @var ArticleProvider */
    public ArticleProvider $articleProvider;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct( DataProvider $dataProvider)
    {
        $this->articleProvider = $dataProvider->articleProvider;
        $this->view = "src/Views/concreteArticleView.php";

        parent::__construct($dataProvider);
    }

    /**
     * @param array $param
     * @return void
     */
    public function render(array $param)
    {
        $values = $this->articleProvider->getArticleByUrlKey($param["url_key"]);
        $this->articleCreate($values);

        require $this->view;
    }

    /**
     * @param array $values
     * @return void
     */
    private function articleCreate(array $values)
    {
        $id = $values["id"];
        $url_key = $values["url_key"];
        $active = $values["active"];
        $image = $values["image"];
        $title = $values["title"];
        $content = $values["content"];
        $published_date = $values["published_date"];
        $author = $values["author"];
        $tag = $values["tag"];

        $this->article = new Article($id, $url_key, $active, $image, $title, $content, $published_date, $author,
            $tag);
    }
}