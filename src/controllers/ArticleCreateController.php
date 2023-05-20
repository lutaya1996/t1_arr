<?php
namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;

class ArticleCreateController extends  BaseController
{
    public ?string $hasError;

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
        if (!empty($_POST) && is_array($_POST)) {
            $this->createArticle($_POST);

            if(is_null($this->hasError)) {return;}
        }

        require $this->view;
    }

    private function createArticle($request)
    {
        // Пустой массив содержит приходящие модели
        // Ключ массива будет id
        // Значение Моделька
        if(empty($request["image"]) || empty($request["title"]) || empty($request["description"])) {
            $this->hasError = "Все поля должны быть заполнены";
            return;
        }
        $id = $this->getNewId();
        $newArticle = new Article($id,
                                $request["image"]??"",
                                $request["title"]??"",
                                $request["description"]??"",
                                $request["active"]?true:false);


        $this->dataProvider->createArticle($newArticle);

        header('Location: /articles');
    }
    private  function getNewId() :int
    {
        $maxVal = 0;
        foreach ($this->dataProvider->getArticles() as $article) {
            if ($maxVal < $article->id) {
                $maxVal = $article->id;
            }
        }
        return $maxVal+1;
    }

}