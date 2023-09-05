<?php

namespace tt\Models;

class Comment
{
   /**
    *  @var int
    */
   public int $idRelatedToArticle;

   /**
    *  @var string
    */
   public string $image;

   /**
    *  @var string
    */
   public string $name;

   /**
    *  @var string
    */
   public string $date;

   /**
    *  @var string
    */
   public string $text;

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
