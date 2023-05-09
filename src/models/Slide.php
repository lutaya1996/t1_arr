<?php

namespace tt\Models;

class Slide
{
   public $image;
   public $firstHead;
   public $secondHead;
   public $thirdHead;
   public bool $showOnFirst;

   public function __construct($image, $firstHead, $secondHead, $thirdHead, $showOnFirst)
   {
      $this->image = $image;
      $this->firstHead = $firstHead;
      $this->secondHead = $secondHead;
      $this->thirdHead = $thirdHead;
      $this->showOnFirst = $showOnFirst;
   }
}