<?php

namespace tt\DataProvider;

use tt\Models\Slide;

class DbSlides
{
    /**
     * @return array
     */
   public static function getSlides():array
   {
      return
         [
            new Slide(
               "https://oir.mobi/uploads/posts/2021-04/1619497752_26-oir_mobi-p-rozovii-kotenok-zhivotnie-krasivo-foto-28.jpg",
               "Котята",
               "Наши посетители",
               "",
               false
            ),
            new Slide(
               "assets/img/carousel-1.jpg",
               "Котики",
               "Наши посетители",
               "",
               false
            ),
            new Slide(
               "assets/img/carousel-2.jpg",
               "Собаки",
               "Наши посетители",
               "",
               true
            ),

         ];
   }
}
