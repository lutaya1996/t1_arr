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


}

