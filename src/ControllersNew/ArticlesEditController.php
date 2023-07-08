<?php

namespace tt\ControllersNew;

use tt\DataProvider\ArticleProvider;
use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Helpers\Request;
use tt\Helpers\Session;
use tt\Models\Article;


class ArticlesEditController
{
    /** @var Article[] */
    public array $articles;
    public ?string $hasError;
    public $dataProvider;
    public $session;
    public $articleProvider;
    public $request;
    public $view;
    public $uri;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(ArticleProvider $articleProvider, DataProvider $dataProvider)
    {

        $this->session = new Session();
        $this->session->start();
        $this->dataProvider = $dataProvider;
        $this->articleProvider = $articleProvider;
        $this->request = new Request();
        $this->view = "src/Views/articlesEditView.php";
    }
    public function setUri($uri)
    {
        $this->uri = $uri;
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
        // Пустой массив содержит приходящие модели
        // Ключ массива будет id
        // Значение Моделька
        $requestArticles = [];

        /** @var mixed $value */
        foreach ($request as $key => $value) {
            [$nameField, $numberFieldRaw] = explode("-", $key);

            $id = (int)$numberFieldRaw;

            if (
                !isset($requestArticles[$id])
            ) {
                $requestArticles[$id] = new Article($id, "", "", "", true, "", "", 0);
            }

            switch ($nameField) {
                case "image":
                    $requestArticles[$id]->image = $value;
                    break;
                case "title":
                    $requestArticles[$id]->title = $value;
                    break;
                case "description":
                    $requestArticles[$id]->description = $value;
                    break;
                case "active":
                    $requestArticles[$id]->active = true;
                case "author":
                    $requestArticles[$id]->author = $value;
                    break;
                case "tag":
                    $requestArticles[$id]->tag = $value;
                    break;
                case "amountOfComments":
                    $requestArticles[$id]->amountOfComments = $value;
                    break;
            }
        }

        /**
         * @var  Article $value
         */
        foreach ($requestArticles as $value) {
            $this->dataProvider->updateArticle($value);
        }

        header("Location: /articles");
        exit();
    }
}
