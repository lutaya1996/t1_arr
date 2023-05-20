<?php

namespace tt\Models;

class Slide
{
    /**
     * @var string
     */
   public string $image;

    /**
     * @var string
     */
   public string $firstHead;

    /**
     * @var string
     */
   public string $secondHead;

    /**
     * @var string
     */
   public string $thirdHead;

    /**
     * @var bool
     */
   public bool $showOnFirst;

    /**
     * @param string $image
     * @param string $firstHead
     * @param string $secondHead
     * @param string $thirdHead
     * @param string $showOnFirst
     */
   public function __construct(
       string $image,
       string $firstHead,
       string $secondHead,
       string $thirdHead,
       string $showOnFirst
   ) {
      $this->image = $image;
      $this->firstHead = $firstHead;
      $this->secondHead = $secondHead;
      $this->thirdHead = $thirdHead;
      $this->showOnFirst = $showOnFirst;
   }
}