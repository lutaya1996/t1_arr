<?php

namespace tt\ControllersNew;

use tt\DataProvider\ArticleProvider;
use tt\DataProvider\DataProvider;
use tt\Helpers\Session;
use tt\Models\Article;

class ConcreteArticleController
{
    /** @var Article */
    public Article $article;

    /** @var string */
    public string $uri;

    /** @var string */
    protected string $view;

    /** @var ArticleProvider */
    public ArticleProvider $articleProvider;

    public $dataProvider;
    public $session;

    public function __construct( DataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
        $this->session = new Session();
        $this->view = "src/Views/concreteArticleView.php";
        $this->articleProvider = $dataProvider->articleProvider;


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
        $values = $this->articleProvider->getArticleByUrlKey($param["url_key"]);
        $this->articleCreate($values);

        require $this->view;
    }

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