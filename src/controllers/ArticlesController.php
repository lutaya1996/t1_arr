<?php

namespace tt\Controllers;

use tt\DataProvider\ArticleProvider;
use tt\DataProvider\DataProvider;
use tt\Models\Article;

class ArticlesController extends BaseController
{
    /** @var Article[] */
    public array $articles;


    /** @var ArticleProvider */
    public ArticleProvider $articleProvider;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct( DataProvider $dataProvider)
    {
        $this->articleProvider = $dataProvider->articleProvider;
        $this->view = "src/Views/articlesView.php";

        parent::__construct($dataProvider);
    }

    /**
     * @param array $param
     * @return void
     */
    public function render(array $param)
    {
        $values = $this->articleProvider->getArticles();
        $this->articlesCreate($values);

        require $this->view;
    }

    /**
     * @param array $values
     * @return void
     */
    private function articlesCreate(array $values)
    {
        $articles = [];

        foreach ($values as $article) {

            $id = $article["id"];
            $url_key = $article["url_key"];
            $active = $article["active"];
            $image = $article["image"];
            $title = $article["title"];
            $content = $article["content"];
            $published_date = $article["published_date"];
            $author = $article["author"];
            $tag = $article["tag"];

            $articles[] = new Article($id, $url_key, $active, $image, $title, $content, $published_date, $author,
                $tag);
        }
        $this->articles = $articles;
    }
}

