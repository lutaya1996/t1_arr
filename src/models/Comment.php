<?php

namespace tt\Models;

class Comment
{
   /**
    *  @var int
    */
   public $idRelatedToArticle;

   /**
    *  @var string
    */
   public $image;

   /**
    *  @var string
    */
   public $name;

   /**
    *  @var string
    */
   public $date;

   /**
    *  @var string
    */
   public $text;

   /**
    * @param int $idRelatedToArticle
    * @param string $image
    * @param string $name
    * @param string $date
    * @param string $text
    */
   public function __construct(
      int $idRelatedToArticle,
      string $image,
      string $name,
      string $date,
      string $text
   ) {
      $this->$idRelatedToArticle = $idRelatedToArticle;
      $this->image = $image;
      $this->name = $name;
      $this->date = $date;
      $this->text = $text;
   }
}
