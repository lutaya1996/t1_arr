<?php

namespace tt\ControllersNew;

use tt\DataProvider\ArticleProvider;
use tt\DataProvider\DataProvider;
use tt\Helpers\Session;
use tt\Models\Article;

class ArticlesController
{
    /** @var Article[] */
    public array $articles;

    /** @var string */
    public string $uri;

    /** @var string */
    protected string $view;

    /** @var ArticleProvider */
    public ArticleProvider $articleProvider;
    public DataProvider $dataProvider;
    public $session;

    /**
     * @param ArticleProvider $articleProvider
     */
    public function __construct(ArticleProvider $articleProvider, DataProvider $dataProvider)
    {
        $this->session = new Session();
        $this->session->start();
        $this->view = "src/Views/articlesView.php";
        $this->articleProvider = $articleProvider;
        $this->dataProvider = $dataProvider;
    }

    /**
     * @param string $uri
     * @return void
     */
    public function setUri(string $uri): void
    {
        $this->uri = $uri;
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

