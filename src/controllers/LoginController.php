<?php

namespace tt\Controllers;

use tt\DataProvider\Database;
use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Helpers\ValidateInputs;

class LoginController extends BaseController
{
    /** @var Database */
    private Database $database;

   /** @var string|null  */
    public ?string $error;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/loginView.php";

        parent::__construct($dataProvider);

        $this->database = $this->dataProvider->database;
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

        $statement = $this->database->getConnection()->prepare(
            "SELECT * FROM users WHERE email = :email"
        );
        $statement->execute([
            "email" => $emailAuth
        ]);

        $user = $statement->fetch();

        if (empty($user)) {
            $this->error = "Пользователь с таким логином не существует";
            return;
        }
        if (password_verify($passwordAuth, $user["password"])) {

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
