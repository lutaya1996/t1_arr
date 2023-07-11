<?php

namespace tt\Controllers;

use tt\DataProvider\ArticleProvider;
use tt\DataProvider\DataProvider;


class ArticlesEditController extends BaseController
{

    public array $articles;
    public ?string $hasError;
    public ArticleProvider $articleProvider;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->articleProvider = $dataProvider->articleProvider;
        $this->view = "src/Views/articlesEditView.php";

        parent::__construct($dataProvider);
    }

    // метод, подключающий нужную вьюшку

    /**
     * @param array $param
     * @return void
     */
    public function render(array $param)
    {
        $this->articles = $this->articleProvider->getArticles();

        if (!empty($this->request->getPost())) {
            $this->updateArticles($this->request->getPost());
        }
        require $this->view;
    }

    /**
     * @param array $request
     * @return void
     */
    private function updateArticles(array $request)
    {
            foreach ($request as $key => $articleRequest) {

                $id = $key;
                $active = isset($articleRequest["active"]) ? "1" : "0";

                $values = [
                    "id" => $id,
                    "active" => $active,
                    "image" => $articleRequest["image-$id"],
                    "title" => $articleRequest["title-$id"],
                    "content" => $articleRequest["content-$id"],
                    "published_date" => $articleRequest["published_date-$id"],
                    "author" => $articleRequest["author-$id"],
                    "tag" => $articleRequest["tag-$id"],
                    "url_key" => $articleRequest["url_key-$id"]
                ];

                $this->articleProvider->updateConcreteArticle($values);
            }

        header("Location: /articles");
        exit();
    }
}
