<?php

namespace tt\DataProvider;

use tt\Helpers\Printer;
use tt\Helpers\Request;
use tt\Models\Article;
use tt\Models\Service;
use tt\Models\Slide;
use tt\Models\User;
use tt\Helpers\Session;
use tt\Models\Variable;

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

        if (!$this->session->getData(KEY_DB_ON)) {

            $this->session->setData(KEY_DB_ON, true);

            $this->session->setData(KEY_ARTICLES, DbArticles::getArticles());
            $this->session->setData(KEY_SLIDES, DbSlides::getSlides());
            $this->session->setData(KEY_SERVICES, DbServices::getServices());
            $this->session->setData(KEY_VARIABLES, DbVariables::getVariables());
            $this->session->setData(MAIN_MENU, [
                "Главная" => "/",
                "Услуги и цены" => "/catalog",
                'Мои статьи' => '/articles',
                "Контакты" => "/contacts",
                "Наш блог" => "/blog",
            ]);
            $this->session->setData(KEY_TESTIMONIALS, DbTestimonials::getTestimonials());
            $this->session->setData(KEY_TEAM, DbTeam::getTeam());
            $this->session->setData(KEY_AUTHORS, DbAuthors::getAuthors());
            $this->session->setData(KEY_USERS, DbUsers::getUsers());
            $this->session->setData(KEY_COMMENTS, DbComments::getComments());
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
    public function getArticles(): array
    {
        return $this->session->getData(KEY_ARTICLES);
    }

    /**
     * @param $id
     * @return object|null
     */
    public function getConcreteArticle($id): ?object
    {
        foreach ($this->session->getData(KEY_ARTICLES) as $key => $value) {
            if ($value->id == $id) {
                return $value;
            }
        }
        return null;
    }

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

    /**
     * @param Article $article
     * @return void
     */
    public function createArticle(Article $article)
    {
        $this->session->addData(KEY_ARTICLES, $article);
    }

    /**
     * @param $id
     * @return void
     */
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
    public function updateConcreteArticle(Article $article)
    {
        foreach ($this->session->getData(KEY_ARTICLES) as $key => $value) {
            if ($value->id == $article->id) {
                $this->session->getData(KEY_ARTICLES)[$key] = $article;
            }
        }
    }

    // *** Функции для работы со слайдами *****************************************************************

    /**
     * @return Slide[]
     */
    public function getSlides(): array
    {
        return $this->session->getData(KEY_SLIDES);
    }

    // *** Функции для работы с сервисами *****************************************************************

    /**
     * @return Service[]
     */
    public function getServices(): array
    {
        return $this->session->getData(KEY_SERVICES);
    }

    // *** Функции для работы с вариативами *****************************************************************

    /**
     * @param $variableKey
     * @return null|string
     */
    public function getVariables($variableKey): ?string
    {
        foreach ($this->session->getData(KEY_VARIABLES) as $value) {
            if (is_null($value)) {
                continue;
            }
            if ($value->key == $variableKey) {
                return $value->value;
            }
        }
        return null;
    }

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

    // ***Функция для работы с отзывами*******************************

    /**
     * @return array
     */
    public function getTestimonials(): array
    {
        return $this->session->getData(KEY_TESTIMONIALS);
    }

    //***Функция для работы с командой******** *

    /**
     * @return array
     */
    public function getTeam(): array
    {
        return $this->session->getData(KEY_TEAM);
    }

    //***Функция для работы с авторами******** *

    /**
     * @return array
     */
    public function getAuthors(): array
    {
        return $this->session->getData(KEY_AUTHORS);
    }

    //***Функция для работы с Users******* *

    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        return $this->session->getData(KEY_USERS);
    }

    /**
     * @param User $user
     * @return void
     */
    public function createUser(User $user)
    {
        $this->session->addData(KEY_USERS, $user);
    }

    //***Функция для работы с  комментариями******** *

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->session->getData(KEY_COMMENTS);
    }
}
