<?php

namespace tt\Models;

class Team {
   
   public $image;
   public $name;
   public $position;

   public function __construct($image, $name, $position)
   {
      $this->image = $image;
      $this->name = $name;
      $this->position = $position;
   }
}