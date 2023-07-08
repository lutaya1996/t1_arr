<?php

namespace tt\DataProvider\Db;

use tt\Models\Comment;

class DbComments
{

   public static function getComments()
   {
      return [
         new Comment(
            1,
            "https://clck.ru/34neLX",
            "Alex Valt",
            "23.12.2023",
            "Большоооооооооооооооой комменатрий"
         ),
       

      ];
   }
}
