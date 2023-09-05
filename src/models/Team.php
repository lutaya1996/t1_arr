<?php

namespace tt\Models;

class Team {
   
   public string $image;
   public string $name;
   public string $position;

    /**
     * @param $image
     * @param $name
     * @param $position
     */
   public function __construct($image, $name, $position)
   {
      $this->image = $image;
      $this->name = $name;
      $this->position = $position;
   }
}