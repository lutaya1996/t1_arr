<?php

namespace tt\DataProvider;

use tt\Helpers\Request;
use tt\Helpers\Session;

const KEY_DB_ON = "DB_ON";
const MAIN_MENU = "DB_MAIN_MENU";
const KEY_CATEGORIES = "DB_CATEGORIES";
const KEY_TAGS = "DB_TAGS";

class DataProvider
{
    public Session $session;
    public Database $database;
    public Request $request;
    /** @var \PDO */
    public \PDO $connection;
    public VariablesProvider $variablesProvider;
    public TestimonialsProvider $testimonialsProvider;
    public TeamProvider $teamProvider;
    public UserProvider $userProvider;
    public SlidesProvider $slidesProvider;
    public ServicesProvider $servicesProvider;
    public CommentsProvider $commentsProvider;
    public AuthorsProvider $authorsProvider;
    public ArticleProvider $articleProvider;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->connection = $database->getConnection();
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
