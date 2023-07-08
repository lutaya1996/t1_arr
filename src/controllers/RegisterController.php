<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\DataProvider\UserProvider;
use tt\Helpers\Printer;
use tt\Helpers\Request;
use tt\Helpers\Session;
use tt\Helpers\ValidateInputs;

class RegisterController
{
    /** @var array */
    public array $errors;
    /** @var string */
    public string $warning;
    /** @var array */
    public array $invalidDatas;
    public UserProvider $userProvider;
    public string $view;
    public $uri;
    public $dataProvider;
    public $request;
    public $session;

    public function __construct(DataProvider $dataProvider)
    {
        $this->session = new Session();
        $this->session->start();
        $this->userProvider = $dataProvider->userProvider;
        $this->errors = [];
        $this->invalidDatas = [];
        $this->view = "src/Views/registerView.php";
        $this->dataProvider = $dataProvider;
        $this->request = new Request();
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
            $this->createUser($this->request->getPost());
        }
        require $this->view;
    }

    //Функция проверки полей на пустоту и совпадение паролей

    /**
     * @param array $request
     * @return void
     */
    private function checkForEmptyInputs(array $request)
    {

        if (empty($request["name"])) {
            $this->errors["name"] = "Пожалуйста, введите имя!";
        }

        if (empty($request["email"])) {
            $this->errors["email"] = "Пожалуйста, введите email!";
        }

        if (empty($request["password"])) {
            $this->errors["password"] = "Пожалуйста, введите пароль!";
        }

        if (empty($request["confirm-password"])) {
            $this->errors["confirm-password"] = "Пожалуйста, повторите пароль!";
        }

        if (!empty($request["password"]) && !empty($request["confirm-password"]) &&
            $request["password"] !== $request["confirm-password"]
        ) {
            $this->errors["same"] = "Введенные пароли не совпадают.";
        }
    }

    //Функция проверки введенных данных на правильность

    /**
     * @param array $request
     * @return void
     */
    private function checkData(array $request)
    {
        if (!empty($request)) {

            $name = ValidateInputs::getNormalData($request["name"]);
            if (!preg_match("/^([А-ЯЁ]{1}[а-яё]{1,29})|([A-Z]{1}[a-z]{1,29})$/u", $name)) {
                $this->invalidDatas["name"] = "Введите корректное имя";
            }

            $email = ValidateInputs::getNormalData($request["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->invalidDatas["email"] = "Некорректно введён email";
            }

            $password = $request["password"];
            if (!preg_match("/^(?=.*\d)(?=.*[a-zA-z])[0-9a-zA-Z]{8,12}$/u", $password)) {
                $this->invalidDatas["password"] = "Некорректный пароль";
            }
        }
    }

    /**
     * @param $request
     * @return void
     */
    private function createUser($request)
    {
        //Проверка инпутов на пустоту и несовпадение паролей
        $this->checkForEmptyInputs($request);
        //Проверка введенных данных на правильность
        $this->checkData($request);

        //Если какой-то инпут пустой или пароли не совпадают,или данные неверны, завершить скрипт.
        if (!empty($this->invalidDatas) | !empty($this->errors)) return;

        //Собираем параметры для сборки нового юзера
        $name = ValidateInputs::getNormalData($request["name"]);
        $email = ValidateInputs::getNormalData($request["email"]);
        /**
         * @var string $password
         */
        $password = password_hash($request["password"], PASSWORD_BCRYPT);

        //Проверяем, есть ли такое имя и email в БД, если да, не создаем юзера
        $this->checkUserInDb($name, $email);

        if (isset($this->warning)) {
            return;
        }

        //Создаем нового юзера в BD
        $this->userProvider->createUser($name, $email, $password);

        //Перенаправляем пользователя на главную страницу в случае удачной регистрации
        // и завершаем скрипт
        header("Location: /");
        exit();
    }

    /**
     * @param string $name
     * @param string $email
     * @return void
     */
    private function checkUserInDb(string $name, string $email)
    {
        //Проверка БД на существование юзера с таким email
        $user = $this->userProvider->checkUserInDb($name);

        if (!empty($user)) {
            $this->warning = "User с таким именем существует";
            return;
        }

        //Проверка БД на существование юзера с таким именем
        $user = $this->userProvider->checkUserInDb($email);

        if (!empty($user)) {
            $this->warning = "User с таким email существует";
            return;
        }
    }
}
