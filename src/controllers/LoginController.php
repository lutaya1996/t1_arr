<?php

namespace tt\Controllers;

use tt\DataProvider\Database;
use tt\DataProvider\DataProvider;
use tt\DataProvider\UserProvider;
use tt\Helpers\ValidateInputs;

class LoginController extends BaseController
{
    /** @var string|null */
    public ?string $error;
    public UserProvider $userProvider;
    public Database $database;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->userProvider = $dataProvider->userProvider;
        $this->view = "src/Views/loginView.php";

        $this->database = $dataProvider->database;

        parent::__construct($dataProvider);
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
        die();
    }
}
