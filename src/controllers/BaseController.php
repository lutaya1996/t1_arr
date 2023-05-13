<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class BaseController
{
   public $uri;
   protected $view;
   public $menu;
   public DataProvider $dataProvider;

   public function __construct(DataProvider $dataProvider)
   {
      $this->menu =
         [
            'Главная' => '/',
            'Котики' => '/cat',
            'Мои статьи' => '/articles',
            'Контакты' => '/contacts'
         ];
      $this->dataProvider = $dataProvider;
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
