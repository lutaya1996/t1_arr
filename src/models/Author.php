<?php

namespace tt\Models;

class Author
{
   /** @var int */
   public int $id;
   /** @var string */
   public string $image;
   /** @var string */
   public string $name;
   /** @var string */
   public string $profession;


   /**
    * @param $id
    * @param $image
    * @param $name
    * @param $profession
    */
   public function __construct($id, $image, $name, $profession)
   {
      $this->id = $id;
      $this->image = $image;
      $this->name = $name;
      $this->profession = $profession;
   }
}
