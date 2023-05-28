<?php

namespace tt\Helpers;

class Printer
{
    /**
     * @param mixed $val
     * @return void
     */
   public static function beautifulP(mixed $val)
   {
      echo '<pre>';
      var_dump($val);
      echo  "</pre>";
   }
}
