<?php

namespace tt\DataProvider;

use tt\Models\Article;
use tt\Controllers\ConcreteArticleController;

class DbArticles
{

    /** @return Article[]
    */
   public static function getArticles(): array
   {
      return
         [new Article(0,"urlkey",true, "/assets/img/carousel-1.jpg","test",
         "content","12.12.2223","dert","grooming" ),
             new Article(1,"urlkey",true, "/assets/img/carousel-1.jpg","test",
                 "content","12.12.2223","dert","grooming" ),
             new Article(2,"urlkey",true, "/assets/img/carousel-1.jpg","test",
                 "content","12.12.2223","dert","grooming" ),
             new Article(3,"urlkey",true, "/assets/img/carousel-1.jpg","test",
                 "content","12.12.2223","dert","grooming" ),
             new Article(4,"urlkey",true, "/assets/img/carousel-1.jpg","test",
                 "content","12.12.2223","dert","grooming" ),
             new Article(5,"urlkey",true, "/assets/img/carousel-1.jpg","test",
                 "content","12.12.2223","dert","grooming" ),

         ];
   }
}
