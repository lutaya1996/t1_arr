<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Helpers\ValidateInputs;

class LoginController extends BaseController
{
    private $session;
    private $database;

    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider, $database, $session)
    {
        $this->database = $database;
        $this->session = $session;
        $this->view = "src/Views/loginView.php";
        parent::__construct($dataProvider);
    }

    public  function render(array $param)
    {
        if(!empty($_POST)) {
            $this->checkUser($_POST);
        }
        require $this->view;
    }

    public function checkUser($request)
    {
        $emailAuth = ValidateInputs::getNormalData($request["email"]);
        $passwordAuth = ValidateInputs::getNormalData($request["password"]);

        foreach ($this->dataProvider->getUsers() as $user)
        {
            if($emailAuth == $user->email) {
                if($passwordAuth == $user->password) {

//                    header("Location:/");
                    exit();
                }
            } else {
                return "Hеверный емейл или пароль!";
            }
        }
    }
}
