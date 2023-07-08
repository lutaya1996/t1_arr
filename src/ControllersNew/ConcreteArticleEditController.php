<?php

namespace tt\ControllersNew;

use tt\DataProvider\ArticleProvider;
use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Helpers\Request;
use tt\Helpers\Session;
use tt\Models\Article;

class ConcreteArticleEditController
{
    /**
     * @var Article $article
     */
    public Article $article;
    /**
     * @var string|null
     */
    public ?string $hasError;
    public $dataProvider;
    public $session;
    public $articleProvider;
    public $request;
    public $view;
    public $uri;

    /**
     * @param ArticleProvider $articleProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->session = new Session();
        $this->dataProvider = $dataProvider;
        $this->articleProvider = $dataProvider->articleProvider;
        $this->request = new Request();
        $this->view = "src/Views/concreteArticleEditView.php";
    }

    public function setUri($uri)
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

        if (!empty($this->request->getPost())) {
            $this->updateArticle($this->request->getPost());
        }
        require $this->view;
    }

    /**
     * @param array $request
     * @return void
     */
    private function updateArticle(array $request)
    {
        if (empty($request["url_key"]) || empty($request["image"]) || empty($request["title"]) ||
            empty($request["content"]) || empty($request["author"]) || empty($request["tag"])) {
            $this->hasError = "Все поля должны быть заполнены";
            return;
        }

        if (
            $request["url_key"] == $this->article->url_key &&
            $request["image"] == $this->article->image &&
            $request["title"] == $this->article->title &&
            $request["content"] == $this->article->content &&
            $request["author"] == $this->article->author &&
            $request["tag"] == $this->article->tag
        ) {
            $this->hasError = "Поля не изменились";
            return;
        }

        $datetime = date_create()->format('Y-m-d H:i:s');

        $id = $this->article->id;
        $url_key = $request["url_key"] ?? "";
        $active = $request["active"] ?? 0;
        $image = $request["image"] ?? "";
        $title = $request["title"] ?? "";
        $content = $request["content"] ?? "";
        $published_date = $request["published_date"] ?? $datetime;
        $author = $request["author"] ?? "";
        $tag = $request["tag"] ?? "";

        $this->articleProvider->updateConcreteArticle([
            "id" => $id,
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
