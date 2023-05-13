<?php

namespace tt\DataProvider;

use tt\Models\Article;

const KEY_DB_ON = "DB_ON";
const KEY_ARTICLES = "DB_ARTICLES";

class DataProvider
{
   private $dbArticles;

   public function __construct()
   {
      $this->dbArticles =
      [
         new Article(
            "assets/img/blog-1.jpg",
            "Помощь котикам",
            "Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, 
         diam sea est diam eos, rebum sit vero stet justo",
            1
         ),
         new Article(
            "assets/img/blog-2.jpg",
            "Помощь котикам",
            "Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, 
         diam sea est diam eos, rebum sit vero stet justo",
            2
         ),
         new Article(
            "assets/img/blog-3.jpg",
            "Помощь котикам",
            "Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, 
         diam sea est diam eos, rebum sit vero stet justo",
            3
         ),
         new Article(
            "https://s11.stc.yc.kpcdn.net/share/i/12/12121744/wr-960.webp",
            "Самый толстый котик Беларуси",
            "Очень тослтый",
            4
         ),
         new Article(
            "https://www.meme-arsenal.com/memes/6ea0141b0b3c11100f0e7d7cc97d3a4e.jpg",
            "Самый толстый котик Беларуси",
            "Очень тослтый",
            5
         )
      ];

      session_start();
      if (!isset($_SESSION[KEY_DB_ON])) {
         session_start();
         $_SESSION[KEY_DB_ON] = true;
         $_SESSION[KEY_ARTICLES] = $this->dbArticles;
      }
   }
   public function getArticles() 
   {
      return $_SESSION[KEY_ARTICLES];
   }
   public function deleteArticle($id)
   {
      foreach($_SESSION[KEY_ARTICLES] as $key => $value)  {
         if($value->id == $id)  {
            unset($_SESSION[KEY_ARTICLES][$key]);
         }
      }
   }
}
