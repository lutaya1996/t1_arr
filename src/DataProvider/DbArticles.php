<?php
namespace tt\DataProvider;
use tt\Models\Article;

class DbArticles
{

   public static function getArticles()
   {
      return
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
   }
}
