<?php

namespace tt\controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;

use const tt\DataProvider\KEY_ARTICLES;

class ArticleEditConcreteController extends  BaseController
{
    public $article;
    public ?string $hasError;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        parent::__construct($dataProvider);
    }

    public function render(array $param)
    {

        foreach ($this->dataProvider->getArticles() as $article) {
            if ($param["id"] == $article->id) {
                $this->article = $article;

                if (!empty($_POST) && is_array($_POST)) {
                    // echo "!!!";
                    Printer::beautifulP($_POST);
                    $this->updateArticle($_POST);

                    if (is_null($this->hasError)) {
                        return;
                    }
                }
                require "src/views/concreteArticleEditView.php";
                die();
            }
        }
        require "src/views/nakhuiView.php";
    }

    private function updateArticle($request)
    {

        if (empty($request["image"]) || empty($request["title"]) || empty($request["description"])) {
            $this->hasError = "Все поля должны быть заполнены";
            return;
        }
        $id = $this->article->id;
        $newArticle = new Article( $id,
                                    $request["image"] ?? "",
                                    $request["title"] ?? "",
                                    $request["description"] ?? "",
                                    $request["active"] ? true : false
                                );
        $this->dataProvider->updateConcreteArticle($newArticle);

        header('Location: /articles');
    }
}
