<?php

namespace tt\Controllers;

use PDO;
use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Helpers\Request;
use tt\Helpers\ValidateInputs;
use tt\DataProvider\Database;
use tt\Helpers\Session;

class RegisterController extends  BaseController
{

    private Database $database;

    public Request $request;


    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/registerView.php";
        parent::__construct($dataProvider);

        $this->database = $this->dataProvider->database;
        $this->request = $this->dataProvider->request;

    }

    /**
     * @param array $param
     * @return void
     */
    public function render(array $param): void
    {
        if (!empty($this->request->getPost())) {
            $this->createUser($this->request->getPost());
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

            $password = $request["password"];
            if (!preg_match("/^(?=.*\d)(?=.*[a-zA-z])[0-9a-zA-Z]{8,12}$/u", $password)) {
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
        /**
         * @var string $name
         */
        $name = ValidateInputs::getNormalData($request["name"]);
        /**
         * @var string $email
         */
        $email = ValidateInputs::getNormalData($request["email"]);
        /**
         * @var string $password
         */
        $password = password_hash($request["password"], PASSWORD_BCRYPT);

        //TODO
        //Проверяем, есть ли такое имя и email в БД, если да, не создаем юзера
        $statement = $this->database->getConnection()->prepare(
            "SELECT 1 FROM users WHERE name = :name LIMIT 1"
        );

        $statement->execute([
            'name' => $name
        ]);
        $user = $statement->fetch();
        if(!empty($user)) {
            exit( "User с таким именем существует");
        }

        $statement = $this->database->getConnection()->prepare(
            "SELECT 1 FROM users WHERE email = :email LIMIT 1"
        );
        $statement->execute([
            'email' => $email
        ]);
        $user = $statement->fetch();
        if(!empty($user)) {
            exit( "User с таким email существует");
        }


        //Создаем нового юзера в BD
        $statement = $this->database->getConnection()->prepare(
            "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)"
        );
        $statement->execute([
            "name" => $name,
            "email" => $email,
            "password" => $password
        ]);

        //Перенаправляем пользователя на главную страницу в случае удачной регистрации
        // и завершаем скрипт
//        header("Location: /");
//        exit();
    }
}
