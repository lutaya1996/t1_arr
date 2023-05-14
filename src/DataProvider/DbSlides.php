<?php

namespace tt\DataProvider;

use tt\Models\Slide;

class DbSlides
{

   public static function getSlides()
   {
      return
         [
            new Slide(
               "https://oir.mobi/uploads/posts/2021-04/1619497752_26-oir_mobi-p-rozovii-kotenok-zhivotnie-krasivo-foto-28.jpg",
               "Розовый котик",
               "Котенок",
               "розовый",
               false
            ),
            new Slide(
               "assets/img/carousel-1.jpg",
               "Коты",
               "Коты коты",
               "Котовские",
               false
            ),
            new Slide(
               "assets/img/carousel-2.jpg",
               "Собаки",
               "Собакииииииииии",
               "Собачные",
               true
            ),

         ];
   }
}
