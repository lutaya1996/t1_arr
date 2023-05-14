<?php
namespace tt\Models;

class Variable
{
   //Сервер
   const SERVER_DOMAIN = "SERVER_DOMAIN";

   //настройки контента
   const INDEX_SERVICE_HEAD1 = "INDEX_SERVICE_HEAD1";
   const INDEX_SERVICE_HEAD2 = "INDEX_SERVICE_HEAD2";
   const ARTICLE_HEAD1 = "ARTICLE_HEAD1";
   const ARTICLE_HEAD2 = "ARTICLE_HEAD2";
   const CONTACT_HEAD1 = "CONTACT_HEAD1";
  
   public $key;
   public $value;

   public function __construct($key, $value)
   {
      $this->key = $key;
      $this->value = $value;
   }
}