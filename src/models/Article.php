<?php
namespace tt\Models;

class Article
{
   public $id;
   public $image;
   public $title;
   public $description;

   public function __construct( $id, $image, $title, $description)
   {
      $this->id = $id;
      $this->image = $image;
      $this->title = $title;
      $this->description = $description;
   }


}