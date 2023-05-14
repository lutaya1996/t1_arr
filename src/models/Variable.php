<?php
namespace tt\Models;

class Variable
{
   const INDEX_SERVICE_HEAD1 = "INDEX_SERVICE_HEAD1";
   const INDEX_SERVICE_HEAD2 = "INDEX_SERVICE_HEAD2";
   const ARTICLE_HEAD1 = "ARTICLE_HEAD1";
   const ARTICLE_HEAD2 = "ARTICLE_HEAD2";
   public $key;
   public $value;

   public function __construct($key, $value)
   {
      $this->key = $key;
      $this->value = $value;
   }
}