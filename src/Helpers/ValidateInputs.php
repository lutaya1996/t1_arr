<?php

namespace tt\Helpers;

class ValidateInputs
{
    /**
     * @param string $data
     * @return string
     */
    public static function getNormalData(string $data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


}

