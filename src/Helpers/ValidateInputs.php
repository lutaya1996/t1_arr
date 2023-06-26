<?php

namespace tt\Helpers;

class ValidateInputs
{

    public static function getNormalData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getErrorMessageForEmptyInput($request)
    {
        if (empty($request["name"])) {
            echo "Имя обязательно для ввода!";
        } elseif (empty($request["email"])) {
            echo "Введите email";
        } elseif (empty($request["password"])) {
            echo "Введите пароль";
        } elseif (empty($request["confirm-password"])) {
            echo "Повторите пароль";
        } elseif (
            $request["password"] !== $request["confirm-password"]
        ) {
            echo "Введенные пароли не совпадают.";
        }
    }
}

