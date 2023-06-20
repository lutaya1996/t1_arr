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
   
   //настройки контента
   const INDEX_SERVICE_HEAD1 = "INDEX_SERVICE_HEAD1";
   const INDEX_SERVICE_HEAD2 = "INDEX_SERVICE_HEAD2";
   const ARTICLE_HEAD1 = "ARTICLE_HEAD1";
   const ARTICLE_HEAD2 = "ARTICLE_HEAD2";
   const CONTACT_HEAD1 = "CONTACT_HEAD1";
   const CATS_HEAD1 = "CATS_HEAD1";
   const CATS_HEAD2 = "CATS_HEAD2";

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
