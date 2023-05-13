<?php
namespace tt\Models;

class Article
{
   public $image;
   public $title;
   public $description;
   public $id;

   public function __construct($image, $title, $description, $id)
   {
      $this->image = $image;
      $this->title = $title;
      $this->description = $description;
      $this->id = $id;
   }


}