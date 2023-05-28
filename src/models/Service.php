<?php
namespace tt\Models;

class Service
{
    /** @var int */
   public int $id;
   /** @var string */
   public string $iconClass;
   /** @var string */
   public string $title;
   /** @var string */
   public string $description;

    /**
     * @param $id
     * @param $iconClass
     * @param $title
     * @param $description
     */
   public function __construct($id, $iconClass, $title, $description)
   {
      $this->id = $id;
      $this->iconClass = $iconClass;
      $this->title = $title;
      $this->description = $description;
   }
}