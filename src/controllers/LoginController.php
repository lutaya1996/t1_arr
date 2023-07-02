<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Helpers\ValidateInputs;

class LoginController extends BaseController
{
    private $database;

    private $post;
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/loginView.php";
        parent::__construct($dataProvider);

        $this->database = $this->dataProvider->database;
        $this->post =$this->dataProvider->request->getPost();
    }

    public  function render(array $param)
    {
        if(!empty($this->post)) {
            $this->loginUser($this->post);
        }
        require $this->view;
    }

    public function loginUser($request)
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

        if(empty($user)) {
            exit("user not found");
        }
        if(password_verify($passwordAuth, $user["password"]))  {

            $this->session->setData("user",
                                    [   "userId" => $user["id"],
                                        "username" => $user["name"],
                                        "email" => $user["email"]
                                    ]);
            header("Location: /");
            exit();
        }
        exit("incorrect login or email");
    }
}
