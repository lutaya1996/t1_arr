<?php

namespace tt\Controllers;

use tt\Models\Slide;

class IndexController extends BaseController
{
   public $slides;

   public function __construct()
   {
      $this->view = "src/views/indexView.php";
      $this->slides = [
         new Slide(
            "https://oir.mobi/uploads/posts/2021-04/1619497752_26-oir_mobi-p-rozovii-kotenok-zhivotnie-krasivo-foto-28.jpg",
            "Розовый котик",
            "Котенок",
            "розовый",
            false
         ),
         new Slide(
            "assets/img/carousel-1.jpg",
            "Коты",
            "Коты коты",
            "Котовские",
            false
         ),
         new Slide(
            "assets/img/carousel-2.jpg",
            "Собаки",
            "Собакииииииииии",
            "Собачные",
            true
         ),

      ];
      parent::__construct();
   }

}
