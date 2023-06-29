<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Helpers\ValidateInputs;
use tt\Models\User;
use const tt\DataProvider\KEY_USERS;

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

    /**
     * @param $request
     * @return void
     */
    private function createUser($request)
    {
        // Пустой массив содержит приходящие модели
        // Ключ массива будет id
        // Значение Моделька
        $error = $this->checkForEmptyInputs($request);
        if(!empty($error)) return;

        /**
         * @var int $id
         */
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

        /**
         * @var User $newUser
         */
        $newUser = new User(
                            $id,
                            $name ?? "",
                            $email ?? "",
                            $password ?? "",
        );


        $this->dataProvider->createUser($newUser);

        header("Location: /");
        exit();
    }

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

    public  function checkData($request): string
    {
        $name = ValidateInputs::getNormalData($request["name"]);
        if (!preg_match("/^([А-ЯЁ]{1}[а-яё]{29})|([A-Z]{1}[a-z]{29})$/u",$name)) {
            return "Введите корректное имя";
        }

        $email = ValidateInputs::getNormalData($request["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Некорректно введён email";
        }

        $password = ValidateInputs::getNormalData($request["password"]);
         if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,12}$/u",$password)) {
             return "Некорректный пароль";
         }
    }

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
