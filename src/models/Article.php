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
    *  @var string
    */
   public $author;


   /**
    *  @var string
    */
   public $tag;


   /**
    *  @var int
    */
   public $amountOfComments;

   /**
    * @param int $id
    * @param string $image
    * @param string $title
    * @param string $description
    * @param boolean $active
    * @param string $author
    * @param string $tag
    * @param int $amountOfComments
    */
   public function __construct(
      int $id,
      string $image,
      string $title,
      string $description,
      bool $active,
      string $author,
      string $tag,
      int $amountOfComments
   ) {
      $this->id = $id;
      $this->image = $image;
      $this->title = $title;
      $this->description = $description;
      $this->active = $active;
      $this->author = $author;
      $this->tag = $tag;
      $this->amountOfComments = $amountOfComments;
   }
}
