<?php

namespace tt\DataProvider;

use tt\Models\Variable;

const KEY_DB_ON = "DB_ON";
const KEY_ARTICLES = "DB_ARTICLES";
const KEY_SLIDES = "DB_SLIDES";
const KEY_SERVICES = "DB_SERVICES";
const KEY_VARIABLES = "DB_VARIABLES";

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
}
