<?php

namespace tt\Models;

class Variable
{
   //Сервер
   const SERVER_DOMAIN = "SERVER_DOMAIN";

   //Ссылки
   const URL_ARTICLES_EDIT = "URL_ARTICLES_EDIT";
   const  URL_ARTICLES_CREATE = "URL_ARTICLES_CREATE";
   const URL_ARTICLE_EDIT = "URL_ARTICLE_EDIT";
   const URL_CATALOG = "URL_CATALOG";

   //Пути для подключения компонентов
   const PATH_FOOTER = "PATH_FOOTER";
   const PATH_HEADER = "PATH_HEADER";
   const PATH_PRICING_PLAN = "PATH_PRICING_PLAN";
   const PATH_FOOTER_MENU = "PATH_FOOTER_MENU";
   const PATH_MAIN_MENU = "PATH_MAIN_MENU";
   
   //настройки контента
   const INDEX_SERVICE_HEAD1 = "INDEX_SERVICE_HEAD1";
   const INDEX_SERVICE_HEAD2 = "INDEX_SERVICE_HEAD2";
   const ARTICLE_HEAD1 = "ARTICLE_HEAD1";
   const ARTICLE_HEAD2 = "ARTICLE_HEAD2";
   const CONTACT_HEAD1 = "CONTACT_HEAD1";
   const BLOG_HEAD = "BLOG_HEAD";
   const PRICING_PLAN_HEAD1 = "PRICING_PLAN_HEAD1";
   const PRICING_PLAN_HEAD2 = "PRICING_PLAN_HEAD2";

    /** @var string  */
   public string $key;
   /** @var string  */
   public string $value;

    /**
     * @param $key
     * @param $value
     */
   public function __construct($key, $value)
   {
      $this->key = $key;
      $this->value = $value;
   }
}
