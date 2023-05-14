<?php
namespace tt\Models;

class Service
{
   public $id;
   public $iconClass;
   public $title;
   public $description;
   
   public function __construct($id, $iconClass, $title, $description)
   {
      $this->id = $id;
      $this->iconClass = $iconClass;
      $this->title = $title;
      $this->description = $description;
   }
}