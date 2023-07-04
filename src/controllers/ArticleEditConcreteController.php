<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;

class ArticleEditConcreteController extends BaseController
{
    /**
     * @var Article $article
     */
    public Article $article;
    /**
     * @var string|null
     */
    public ?string $hasError;

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
            require "src/Views/nakhuiView.php";
            die();
        }

        if (!empty($this->request->getPost())) {
            $this->updateArticle($this->request->getPost());
        }
        require "src/Views/concreteArticleEditView.php";
    }

    /**
     * @param array $request
     * @return void
     */
    private function updateArticle(array $request)
    {
        if (empty($request["image"]) || empty($request["title"]) || empty($request["description"]) ||
            empty($request["author"]) || empty($request["tag"]) || empty($request["amountOfComments"])) {
            $this->hasError = "Все поля должны быть заполнены";
            return;
        }

        if (
            $request["image"] == $this->article->image &&
            $request["title"] == $this->article->title &&
            $request["description"] == $this->article->description &&
            $request["author"] == $this->article->author &&
            $request["tag"] == $this->article->tag &&
            $request["amountOfComments"] == $this->article->amountOfComments
        ) {
            $this->hasError = "Поля не изменились";
            return;
        }

        $this->article->image = $request["image"] ?? "";
        $this->article->title = $request["title"] ?? "";
        $this->article->description = $request["description"] ?? "";
        $this->article->active = $request["active"] ? true : false;
        $this->article->author = $request["author"] ?? "";
        $this->article->tag = $request["tag"] ?? "";
        $this->article->amountOfComments = $request["amountOfComments"] ?? "";
        $this->dataProvider->updateConcreteArticle($this->article);

        header("Location: /articles");
        exit();
    }
}
