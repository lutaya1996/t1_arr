<?php

namespace tt\Helpers;

class Printer
{
   public static function beautifulP(mixed $val)
   {
      echo '<pre>';
      var_dump($val);
      echo  "</pre>";
   }
}
