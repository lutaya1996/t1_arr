<?php

namespace tt\controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;

use const tt\DataProvider\KEY_ARTICLES;

class ArticleEditConcreteController extends  BaseController
{
    /**
     * @var Article $article
     */
    public Article  $article;
    /**
     * @var string|null
     */
    public ?string $hasError = null;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        parent::__construct($dataProvider);
    }

    /**
     * @param array $param
     * @return void
     */
    public function render(array $param)
    {
        
        $this->article = $this->dataProvider->getConcreteArticle($param["id"]);

        if (is_null($this->article)) {
            require "src/views/nakhuiView.php";
            die();
        }

        if (!empty($_POST) && is_array($_POST)) {
            $this->updateArticle($_POST);
        }
        require "src/views/concreteArticleEditView.php";
       
    }

    /**
     * @param array $request
     * @return void
     */
    private function updateArticle(array $request)
    {
        if (empty($request["image"]) || empty($request["title"]) || empty($request["description"])) {
            $this->hasError = "Все поля должны быть заполнены";
            return;
        }

        if(
            $request["image"] == $this->article->image &&
            $request["title"] == $this->article->title &&
            $request["description"] == $this->article->description
        )  {
            $this->hasError = "Поля не изменились";
            return;
        }

        $this->article->image = $request["image"] ?? "";
        $this->article->title = $request["title"] ?? "";
        $this->article->description = $request["description"] ?? "";
        $this->article->active = $request["active"] ? true : false;
        $this->dataProvider->updateConcreteArticle($this->article);

        header('Location: /articles');
    }
}
