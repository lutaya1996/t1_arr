<?php

namespace tt\Models;

class Article
{
    public int $id;
    public string $url_key;
    public ?bool $active;
    public ?string $image;
    public string $title;
    public ?string $content;
    public string $published_date;
    public string $author;
    public string $tag;
    public int $amountOfComments;


    /**
    * @param int $id
    * @param string $url_key
    * @param ?int $active
    * @param ?string $image
    * @param string $title
    * @param ?string $content
    * @param string $published_date
    * @param string $author
    * @param string $tag
    *
    */
   public function __construct(
      int $id,
      string $url_key,
      ?int $active,
      ?string $image,
      string $title,
      ?string $content,
      string $published_date,
      string $author,
      string $tag
   ) {
      $this->id = $id;
      $this->url_key = $url_key;
      $this->active = $active;
      $this->image = $image;
      $this->title = $title;
      $this->content = $content;
      $this->published_date = $published_date;
      $this->author = $author;
       $this->tag = $tag;
       $this->amountOfComments = 3;
   }
}
