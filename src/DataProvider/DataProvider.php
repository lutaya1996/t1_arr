<?php

namespace tt\DataProvider;

use tt\Models\Article;
use tt\Models\Variable;

const KEY_DB_ON = "DB_ON";
const KEY_ARTICLES = "DB_ARTICLES";
const KEY_SLIDES = "DB_SLIDES";
const KEY_SERVICES = "DB_SERVICES";
const KEY_VARIABLES = "DB_VARIABLES";
const MAIN_MENU = "DB_MAIN_MENU";

class DataProvider
{

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
            'Главная' => '/',
            'Котики' => '/cat',
            'Мои статьи' => '/articles',
            'Контакты' => '/contacts'
         ];
      }
   }

   // *** Функции для работы со статьями ****************************************************************

   public function getArticles()
   {
      return $_SESSION[KEY_ARTICLES];
   }

   public function deleteArticle($id)
   {
      foreach ($_SESSION[KEY_ARTICLES] as $key => $value) {
         if ($value->id == $id) {
            unset($_SESSION[KEY_ARTICLES][$key]);
         }
      }
   }

   public function updateArticle(Article $article)
   {
      foreach ($_SESSION[KEY_ARTICLES] as $key => $value) {
         if ($value->id == $article->id) {
            $_SESSION[KEY_ARTICLES][$key] = $article;
         }
      }
   }

   // *** Функции для работы со слайдами *****************************************************************

   public function getSlides()
   {
      return $_SESSION[KEY_SLIDES];
   }

   // *** Функции для работы с сервисами *****************************************************************

   public function getServices()
   {
      return $_SESSION[KEY_SERVICES];
   }

   // *** Функции для работы с вариативами *****************************************************************

   public function getVariables($variableKey)
   {
      foreach ($_SESSION[KEY_VARIABLES] as $key => $value) {
         if ($value->key == $variableKey) {
            return $value->value;
         }
      }
   }

   // *** Функции для работы с главным меню ************************************************************

   public function getMainMenu()
   {
      return $_SESSION[MAIN_MENU];
   }
}
