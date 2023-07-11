<?php

namespace tt\Controllers;

use tt\DataProvider\ArticleProvider;
use tt\DataProvider\DataProvider;

class ArticleCreateController extends BaseController
{
    /**
     * @var string|null
     */
    public ?string $hasError;
    public ArticleProvider $articleProvider;

    public function __construct(DataProvider $dataProvider)
    {
        $this->articleProvider = $dataProvider->articleProvider;
        $this->view = "src/Views/articleCreateView.php";

        parent::__construct($dataProvider);
    }

    /**
     * @param array $param
     * @return void
     */
    public function render(array $param)
    {
        if (!empty($this->request->getPost())) {
            $this->createArticle($this->request->getPost());
        }
        require $this->view;
    }

    /**
     * @param $request
     * @return void
     */
    private function createArticle($request): void
    {
        // Пустой массив содержит приходящие модели
        // Ключ массива будет id
        // Значение Моделька
        if (
            empty($request["url_key"]) || empty($request["image"]) || empty($request["title"]) ||
            empty($request["content"]) || empty($request["author"]) || empty($request["tag"])
        ) {
            $this->hasError = "Все поля должны быть заполнены";
            return;
        }

        $datetime = date_create()->format('Y-m-d H:i:s');

        $url_key = $request["url_key"] ?? "";
        $active = isset($request["active"]) ? 1 : 0;
        $image = $request["image"] ?? "";
        $title = $request["title"] ?? "";
        $content = $request["content"] ?? "";
        $published_date = empty($request["published_date"]) ? $datetime : $request["published_date"];
        $author = $request["author"] ?? "";
        $tag = $request["tag"] ?? "";

        $this->articleProvider->articleCreate([

            "url_key" => $url_key,
            "active" => $active,
            "image" => $image,
            "title" => $title,
            "content" => $content,
            "published_date" => $published_date,
            "author" => $author,
            "tag" => $tag
        ]);

        header("Location: /articles");
        exit();
    }

}
