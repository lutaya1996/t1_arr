<?php

namespace tt\Models;

class Testimonial {
   /** @var string  */
   public string $image;

   /** @var string  */
   public string $clientName;

   /** @var string  */
   public string $profession;

   /** @var string  */
   public string $text;

    /**
     * @param $image
     * @param $clientName
     * @param $profession
     * @param $text
     */
   public function __construct($image, $clientName, $profession, $text)
   {
      $this->image = $image;
      $this->clientName = $clientName;
      $this->profession = $profession;
      $this->text = $text;
   }
}