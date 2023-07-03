<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;


class ArticlesEditController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
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
