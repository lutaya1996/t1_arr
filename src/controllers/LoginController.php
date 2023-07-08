<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\DataProvider\UserProvider;
use tt\Helpers\Printer;
use tt\Helpers\Request;
use tt\Helpers\Session;
use tt\Helpers\ValidateInputs;

class LoginController
{
    /** @var string|null */
    public ?string $error;
    public $view;
    public $session;
    public $request;
    public $dataProvider;
    public $userProvider;
    public $uri;

    public function __construct(DataProvider $dataProvider)
    {
        $this->session = new Session();
        $this->dataProvider = $dataProvider;
        $this->userProvider = $dataProvider->userProvider;
        $this->request = new Request();
        $this->view = "src/Views/loginView.php";

        $this->database = $this->dataProvider->database;
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @param array $param
     * @return void
     */
    public function render(array $param)
    {
        if (!empty($this->request->getPost())) {

            $this->loginUser($this->request->getPost());
        }
        require $this->view;
    }

    /**
     * @param array $request
     * @return void
     */
    public function loginUser(array $request)
    {

        $emailAuth = ValidateInputs::getNormalData($request["email"]);
        $passwordAuth = $request["password"];

        //Получаем  юзера из БД по email
        $user = $this->userProvider->checkUserInDb($emailAuth);

        if (empty($user)) {
            $this->error = "Пользователь с таким логином не существует";
            return;
        }
        //Если юзер найден, проверяем его пароль:
        if (password_verify($passwordAuth, $user["password"])) {
            //Записываем в сессию данные юзера:
            $this->session->setData("user",
                ["userId" => $user["id"],
                    "username" => $user["name"],
                    "email" => $user["email"]
                ]);
            header("Location: /");
            exit();
        }
        $this->error = "Неправильный логин или пароль";
        return;
    }
}
