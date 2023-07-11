<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Request;
use tt\Helpers\Session;

class BaseController
{
    /** @var string */
    public string $uri;

    /** @var string */
    protected string $view;

    /** @var DataProvider */
    public DataProvider $dataProvider;

    /** @var Session */
    public Session $session;

    /** @var Request */
    public Request $request;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
        $this->session = new Session();
        $this->request = new Request();

    }

    /**
     * @param string $uri
     * @return void
     */
    public function setUri(string $uri): void
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
