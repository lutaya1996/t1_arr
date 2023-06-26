<?php

namespace tt\DataProvider;

use tt\Models\Article;
use tt\Models\Service;
use tt\Models\Slide;
use tt\Models\User;
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
   /**
    * @return void
    */
   public function __construct()
   {
      session_start();
      if (!isset($_SESSION[KEY_DB_ON])) {

         $_SESSION[KEY_DB_ON] = true;
         $_SESSION[KEY_ARTICLES] = DbArticles::getArticles();
         $_SESSION[KEY_SLIDES] = DbSlides::getSlides();
         $_SESSION[KEY_SERVICES] = DbServices::getServices();
         $_SESSION[KEY_VARIABLES] = DbVariables::getVariables();
         $_SESSION[MAIN_MENU] =
            [
               "Главная" => "/",
               "Услуги и цены" => "/catalog",
               'Мои статьи' => '/articles',
               "Контакты" => "/contacts",
               "Наш блог" => "/blog",
            ];
         $_SESSION[KEY_TESTIMONIALS] = DbTestimonials::getTestimonials();
         $_SESSION[KEY_TEAM] = DbTeam::getTeam();
         $_SESSION[KEY_AUTHORS] = DbAuthors::getAuthors();
         $_SESSION[KEY_USERS] = DbUsers::getUsers();
         $_SESSION[KEY_COMMENTS] = DbComments::getComments();
         $_SESSION[KEY_CATEGORIES] =
            [
               "Безопасное содержание" => "3",
               "Галерея" => "4",
               "Грумминг" => "3",
               "О кошках" => "11",
               "О собаках" => "9",
            ];
         $_SESSION[KEY_TAGS] =
            [
               "Безопасное содержание",
               "Галерея",
               "Грумминг",
               "О кошках",
               "О собаках",
            ];
      }
   }

   // *** Функции для работы со статьями ****************************************************************

   /**
    * @return Article[]
    */
   public function getArticles(): array
   {
      return $_SESSION[KEY_ARTICLES];
   }

   /**
    * @param $id
    * @return object|null
    */
   public function getConcreteArticle($id): ?object
   {
      foreach ($_SESSION[KEY_ARTICLES] as $key => $value) {
         if ($value->id == $id) {
            return $value;
         }
      }
      return null;
   }

   /**
    * @return Article[]
    */
   public  function  getActiveArticles(): array
   {
      $res = [];

      /* @var $value Article */
      foreach ($_SESSION[KEY_ARTICLES]  as $value) {
         if ($value->active) {
            $res[] = $value;
         }
      }
      return  $res;
   }
   /**
    * @param Article $article
    * @return void
    */
   public  function  createArticle(Article $article)
   {
      $_SESSION[KEY_ARTICLES][] = $article;
   }

   /**
    * @param $id
    * @return void
    */
   public function deleteArticle($id)
   {
      foreach ($_SESSION[KEY_ARTICLES] as $key => $value) {
         if ($value->id == $id) {
            unset($_SESSION[KEY_ARTICLES][$key]);
         }
      }
   }

   /**
    * @param Article $article
    * @return void
    */
   public function updateArticle(Article $article)
   {
      foreach ($_SESSION[KEY_ARTICLES] as $key => $value) {
         if ($value->id == $article->id) {
            $_SESSION[KEY_ARTICLES][$key] = $article;
         }
      }
   }

   /**
    * @param Article $article
    * @return void
    */
   public function updateConcreteArticle(Article $article)
   {
      foreach ($_SESSION[KEY_ARTICLES] as $key => $value) {
         if ($value->id == $article->id) {
            $_SESSION[KEY_ARTICLES][$key] = $article;
         }
      }
   }

   // *** Функции для работы со слайдами *****************************************************************

   /**
    * @return Slide[]
    */
   public function getSlides(): array
   {
      return $_SESSION[KEY_SLIDES];
   }

   // *** Функции для работы с сервисами *****************************************************************

   /**
    * @return Service[]
    */
   public function getServices(): array
   {
      return $_SESSION[KEY_SERVICES];
   }

   // *** Функции для работы с вариативами *****************************************************************

   /**
    * @param $variableKey
    * @return null|string
    */
   public function getVariables($variableKey): ?string
   {
      foreach ($_SESSION[KEY_VARIABLES] as $value) {
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
      return $_SESSION[MAIN_MENU];
   }

   // *** Функции для работы с категориями ************************************************************

   /**
    * @return array
    */
   public function getCategories(): array
   {
      return $_SESSION[KEY_CATEGORIES];
   }

   // *** Функции для работы с тегами ************************************************************

   /**
    * @return array
    */
   public function getTags(): array
   {
      return $_SESSION[KEY_TAGS];
   }

   // ***Функция для работы с отзывами*******************************

   /**
    * @return array
    */
   public function getTestimonials(): array
   {
      return $_SESSION[KEY_TESTIMONIALS];
   }

   //***Функция для работы с командой******** *

   /**
    * @return array
    */
   public function getTeam(): array
   {
      return $_SESSION[KEY_TEAM];
   }

   //***Функция для работы с авторами******** *

   /**
    * @return array
    */
   public function getAuthors(): array
   {
      return $_SESSION[KEY_AUTHORS];
   }

    //***Функция для работы с Users******* *

    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        return $_SESSION[KEY_USERS];
    }

    /**
     * @param User $user
     * @return void
     */
    public  function  createUser(User $user)
    {
        $_SESSION[KEY_USERS][] = $user;
    }

   //***Функция для работы с комменатриями******** *

   /**
    * @return array
    */
   public function getComments(): array
   {
      return $_SESSION[KEY_COMMENTS];
   }
}
