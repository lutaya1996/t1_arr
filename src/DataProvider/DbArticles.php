<?php
namespace tt\DataProvider;
use tt\Models\Article;

class DbArticles
{
    /**
     * @return Article[]
     */
   public static function getArticles(): array
   {
      return
      [
         new Article(
            1,
            "assets/img/blog-1.jpg",
            "Помощь котикам",
            "Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, 
         diam sea est diam eos, rebum sit vero stet justo",
             true
         ),
         new Article(
            2,
            "assets/img/blog-2.jpg",
            "Помощь котикам",
            "Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, 
         diam sea est diam eos, rebum sit vero stet justo",
             true
         ),
         new Article(
            3,
            "assets/img/blog-3.jpg",
            "Помощь котикам",
            "Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, 
         diam sea est diam eos, rebum sit vero stet justo",
             true
         ),
         new Article(
            432,
            "https://s11.stc.yc.kpcdn.net/share/i/12/12121744/wr-960.webp",
            "Самый толстый котик Беларуси",
            "Очень тослтый",
             true
         ),
         new Article(
            50,
            "https://www.meme-arsenal.com/memes/6ea0141b0b3c11100f0e7d7cc97d3a4e.jpg",
            "Самый толстый котик Беларуси",
            "Очень тослтый",
             true
         ),
         new Article(
            36,
            "https://chpic.su/_data/stickers/v/vsratiekoti_stickers/vsratiekoti_stickers_014.webp",
            "Красавчик",
            "Скиньте на лечение",
            true
         )
      ];
   }
}
