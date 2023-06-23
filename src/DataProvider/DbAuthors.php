<?php

namespace tt\DataProvider;

use tt\Models\Author;

class DbAuthors
{

   public static function getAuthors()
   {
      return [
         new Author(
            1,
            "https://rostov-veterinar.ru/d/7777.jpg",
            "Mollie Ross",
            "Ветврач"
         ),
         new Author(
            11,
            "https://clck.ru/34neLX",
            "Jennifer Page",
            "Кардиолог"
         ),
         new Author(
            16,
            "https://clck.ru/34neLY",
            "Kate Glover",
            "УЗИст"
         ),
         new Author(
            12,
            "https://clck.ru/34neLg",
            "Lilly Fry",
            "Кинолог"
         ),

      ];
   }
}
