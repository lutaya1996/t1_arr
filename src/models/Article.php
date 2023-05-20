<?php

namespace tt\Models;

class Article
{
   /**
    *  @var int
    */
   public $id;

   /**
    *  @var string
    */
   public $image;

   /**
    *  @var string
    */
   public $title;

   /**
    *  @var string
    */
   public $description;

   /**
    *  @var bool
    */
   public $active;

   /**
    * @param int $id
    * @param string $image
    * @param string $title
    * @param string $description
    * @param boolean $active
    */
   public function __construct(
      int $id,
      string $image,
      string $title,
      string $description,
      bool $active
   ) {
      $this->id = $id;
      $this->image = $image;
      $this->title = $title;
      $this->description = $description;
      $this->active = $active;
   }
}
