<?php

namespace tt\DataProvider;


use tt\Helpers\Request;
use tt\Helpers\Session;
use tt\Models\Article;

const KEY_DB_ON = "DB_ON";
const KEY_ARTICLES = "DB_ARTICLES";
const KEY_SLIDES = "DB_SLIDES";
const KEY_SERVICES = "DB_SERVICES";
const KEY_VARIABLES = "DB_VARIABLES";
const MAIN_MENU = "DB_MAIN_MENU";
const KEY_TESTIMONIALS = "DB_TESTIMONIALS";
const KEY_TEAM = "DB_TEAM";
const KEY_AUTHORS = "DB_AUTHORS";
const KEY_USERS = "DB_USERS";
const KEY_COMMENTS = "DB_COMMENTS";
const KEY_CATEGORIES = "DB_CATEGORIES";
const KEY_TAGS = "DB_TAGS";

class DataProvider
{
    public Session $session;
    public Database $database;
    public Request $request;
    public $variablesProvider;
    public $testimonialsProvider;
    public $teamProvider;
    public $userProvider;
    public $slidesProvider;
    public $servicesProvider;
    public $commentsProvider;
    public $authorsProvider;
    public $articleProvider;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->session = new Session();
        $this->request = new Request();

        //Включаем сессию
        $this->session->start();

        //Создаем объекты для работы с сущностями из БД
        $this->variablesProvider = new VariablesProvider($database);
        $this->testimonialsProvider = new TestimonialsProvider($database);
        $this->teamProvider = new TeamProvider($database);
        $this->userProvider = new UserProvider($database);
        $this->slidesProvider = new SlidesProvider($database);
        $this->servicesProvider = new ServicesProvider($database);
        $this->commentsProvider = new CommentsProvider($database);
        $this->authorsProvider = new AuthorsProvider($database);
        $this->articleProvider = new ArticleProvider($database);


        if (!$this->session->getData(KEY_DB_ON)) {

            $this->session->setData(KEY_DB_ON, true);


            $this->session->setData(MAIN_MENU, [
                "Главная" => "/",
                "Услуги и цены" => "/catalog",
                'Мои статьи' => '/articles',
                "Контакты" => "/contacts",
                "Наш блог" => "/blog",
            ]);

            $this->session->setData(KEY_CATEGORIES, [
                "Безопасное содержание" => "3",
                "Галерея" => "4",
                "Груминг" => "3",
                "О кошках" => "11",
                "О собаках" => "9",
            ]);
            $this->session->setData(KEY_TAGS, [
                "Безопасное содержание",
                "Галерея",
                "Груминг",
                "О кошках",
                "О собаках",
            ]);
        }
    }


    // *** Функции для работы со статьями ****************************************************************



    /**
     * @return Article[]
     */
    public function getActiveArticles(): array
    {
        $res = [];

        /* @var $value Article */
        foreach ($this->session->getData(KEY_ARTICLES) as $value) {
            if ($value->active) {
                $res[] = $value;
            }
        }
        return $res;
    }

    public function deleteArticle($id)
    {
        foreach ($this->session->getData(KEY_ARTICLES) as $key => $value) {
            if ($value->id == $id) {
                unset($this->session->getData(KEY_ARTICLES)[$key]);
            }
        }
    }

    /**
     * @param Article $article
     * @return void
     */
    public function updateArticle(Article $article)
    {
        foreach ($this->session->getData(KEY_ARTICLES) as $key => $value) {
            if ($value->id == $article->id) {
                $this->session->getData(KEY_ARTICLES)[$key] = $article;
            }
        }
    }

    /**
     * @param Article $article
     * @return void
     */


    // *** Функции для работы со слайдами *****************************************************************





    // *** Функции для работы с главным меню ************************************************************

    /**
     * @return array
     */
    public function getMainMenu(): array
    {
        return $this->session->getData(MAIN_MENU);
    }

    // *** Функции для работы с категориями ************************************************************

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->session->getData(KEY_CATEGORIES);
    }

    // *** Функции для работы с тегами ************************************************************

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->session->getData(KEY_TAGS);
    }


}
