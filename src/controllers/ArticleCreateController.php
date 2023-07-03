<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\Article;

class ArticleCreateController extends BaseController
{
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
        $this->view = "src/Views/articleCreateView.php";
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
            empty($request["image"]) || empty($request["title"]) || empty($request["description"]) ||
            empty($request["author"]) || empty($request["tag"]) || empty($request["amountOfComments"])
        ) {
            $this->hasError = "Все поля должны быть заполнены";
            return;
        }

        $id = $this->getNewId();

        $newArticle = new Article(
            $id,
            $request["image"] ?? "",
            $request["title"] ?? "",
            $request["description"] ?? "",
            isset($request["active"]) ? true : false,
            $request["author"] ?? "",
            $request["tag"] ?? "",
            $request["amountOfComments"] ?? "",
        );


        $this->dataProvider->createArticle($newArticle);

         header("Location: /articles");
         exit();
    }

    /**
     * @return int
     */
    private function getNewId(): int
    {
        $maxVal = 0;
        foreach ($this->dataProvider->getArticles() as $article) {
            if ($maxVal < $article->id) {
                $maxVal = $article->id;
            }
        }
        return $maxVal + 1;
    }
}
