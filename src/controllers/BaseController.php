<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;

class BaseController
{
    /** @var string */
   public string $uri;

   /** @var string */
   protected string  $view;

   /** @var DataProvider  */
   public DataProvider $dataProvider;

    /**
     * @param DataProvider $dataProvider
     */
   public function __construct(DataProvider $dataProvider)
   {
      $this->dataProvider = $dataProvider;
   }

    /**
     * @param string $uri
     * @return void
     */
   public function setUri(string $uri)
   {
      $this->uri = $uri;
   }
   // метод, подключающий нужную вьюшку

    /**
     * @param array $param
     * @return void
     */
   public function render(array $param)
   {
      require $this->view;
   }
}
