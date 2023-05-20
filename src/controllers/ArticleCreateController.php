<?php
namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class ArticleCreateController extends  BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/views/articleCreateView.php";

        parent::__construct($dataProvider);
    }
    public function render()
    {
//        if (!empty($_POST) && is_array($_POST)) {
//            $this->createArticle($_POST);
//            return;
//        }

        require $this->view;
    }

    private function createArticle($request)
    {
        // Пустой массив содержит приходящие модели
        // Ключ массива будет id
        // Значение Моделька
        $requestArticles = [];
        foreach ($request as $key => $value) {

            $id = $this->getNewId();

            switch ($key) {
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
            }
        }

        foreach ($requestArticles as $value) {
            $this->dataProvider->createArticle($value);
        }

        header('Location: /articles');
    }
    private  function getNewId() :int
    {
        $ids = [];
        foreach ($this->dataProvider->getArticles() as $key => $article) {
            $ids[] = $key;
        }
        return max($ids);
    }

}