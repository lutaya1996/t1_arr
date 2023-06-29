<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Helpers\ValidateInputs;
use tt\Models\User;

class RegisterController extends  BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/registerView.php";

        parent::__construct($dataProvider);
    }

    /**
     * @param array $param
     * @return void
     */
    public function render(array $param)
    {
        if (!empty($_POST)) {
            $this->createUser($_POST);
        }
        require $this->view;
    }

    //Функция проверки полей на пустоту и совпадение паролей
    /**
     * @param array $request
     * @return array
     */
    public  function checkForEmptyInputs(array $request): array
    {
        $errors = [];

            if (empty($request["name"])) {
                $errors["name"] = "Пожалуйста, введите имя!";
            } else $errors["name"] = "";

            if (empty($request["email"])) {
                $errors["email"] = "Пожалуйста, введите email!";
            } else $errors["email"] = "";

            if (empty($request["password"])) {
                $errors["password"] = "Пожалуйста, введите пароль!";
            } else $errors["password"] = "";

            if (empty($request["confirm-password"])) {
                $errors["confirm-password"] = "Пожалуйста, повторите пароль!";
            } else $errors["confirm-password"] = "";

            if (!empty($request["password"]) && !empty($request["confirm-password"]) &&
                $request["password"] !== $request["confirm-password"]
            ) {
                $errors["same"] = "Введенные пароли не совпадают.";
        } else $errors["same"] = "";

        return $errors;
    }

    //Функция проверки введенных данных на правильность
    /**
     * @param array $request
     * @return array
     */
    public  function checkData(array $request): array
    {
        $errors = [];

        if(!empty($request)) {

            $name = ValidateInputs::getNormalData($request["name"]);
            if (!preg_match("/^([А-ЯЁ]{1}[а-яё]{1,29})|([A-Z]{1}[a-z]{1,29})$/u", $name)) {
                $errors["name"] = "Введите корректное имя";
            } else {
                $errors["name"] = "";
            }

            $email = ValidateInputs::getNormalData($request["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Некорректно введён email";
            } else {
                $errors["email"] = "";
            }

            $password = ValidateInputs::getNormalData($request["password"]);
            if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,12}$/u", $password)) {
                $errors["password"] = "Некорректный пароль";
            } else {
                $errors["password"] = "";
            }
        }
         return $errors;
    }

    /**
     * @param $request
     * @return void
     */
    private function createUser($request)
    {
        //Проверка инпутов на пустоту - если какой-то пустой, завершить скрипт.
        $errors = $this->checkForEmptyInputs($request) ;
        if(!empty($errors["name"]) || !empty($errors["email"]) || !empty($errors["password"]) || !empty($errors["confirm-password"])) return;

        //Проверка введенных данных на правильность
        $invalidData = $this->checkData($request);
        if(!empty($invalidData["name"]) || !empty($invalidData["email"]) || !empty($invalidData["password"])) return;

        //Собираем параметры для сборки нового юзера
        $id = $this->getNewId();
        /**
         * @var string
         */
        $name = ValidateInputs::getNormalData($request["name"]);
        /**
         * @var string
         */
        $email = ValidateInputs::getNormalData($request["email"]);
        /**
         * @var string
         */
        $password = ValidateInputs::getNormalData($request["password"]);

        //Создаем нового юзера
        $newUser = new User(
            $id,
            $name ?? "",
            $email ?? "",
            $password ?? "",
        );


        $this->dataProvider->createUser($newUser);

        //Перенаправляем пользователя на главную страницу в случае удачной регистрации
        // и завершаем скрипт
        header("Location: /");
        exit();
    }

    //Функция создания нового ID
    /**
     * @return int
     */
    private  function getNewId(): int
    {
        $maxVal = 0;
        foreach ($this->dataProvider->getUsers() as $user) {
            if ($maxVal < $user->id) {
                $maxVal = $user->id;
            }
        }
        return $maxVal + 1;
    }
}
