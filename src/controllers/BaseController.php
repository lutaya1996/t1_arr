<?php

namespace tt\Controllers;

class BaseController
{
   public $uri;
   protected $view;
   public $menu;

   public function __construct()
   {
      $this->menu =
         [
            'Главная' => '/',
            'Котики' => '/cat',
            'Мои статьи' => '/articles',
            'Контакты' => '/contacts'
         ];
   }

   public function setUri(string $uri)
   {
      $this->uri = $uri;
   }
   // метод, подключающий нужную вьюшку
   public function render()
   {
      require $this->view;
   }
}
