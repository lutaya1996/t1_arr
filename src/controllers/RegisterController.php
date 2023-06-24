<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use tt\Helpers\Printer;
use tt\Models\User;
use const tt\DataProvider\KEY_USERS;

class RegisterController extends  BaseController
{
    /**
     * @var string
     */
    public string $hasError1;
    public string  $hasError2;

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
        if (!empty($_POST) && is_array($_POST)) {
            $this->createUser($_POST);

            if (isset($this->hasError1) || isset($this->hasError2)) {
                return;
            }
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
        if (
            empty($request["name"]) || empty($request["email"]) || empty($request["password"]) ||
            empty($request["confirm-password"])
        ) {
            $this->hasError1 = "Все поля должны быть заполнены.";
            return;
        }
        elseif (
            $request["password"] !== $request["confirm-password"]
        ) {
            $this->hasError2 = "Введенные пароли не совпадают.";
            return;
        }

        /**
         * @var int $id
         */
        $id = $this->getNewId();

        /**
         * @var User $newUser
         */
        $newUser = new User(
            $id,
            $request["name"] ?? "",
            $request["email"] ?? "",
            $request["password"] ?? "",
        );


        $this->dataProvider->createUser($newUser);
//        Printer::beautifulP($_SESSION[KEY_USERS]);

//        header('Location: /');
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
