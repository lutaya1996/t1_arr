<?php

namespace tt\DataProvider\Db;

use tt\Models\User;

class DbUsers
{

    /**
     * @return User[]
     */
    public static function getUsers(): array
    {
        return [
            new User(
                1,
                "алена",
                "felppt@yandex.ru",
                "123"
            ),
            new User(
                1,
                "ася",
                " Ross@wd.tu",
                "123"
            ),
            new User(
                1,
                "ася",
                " Ross@wd.tu",
                "123"
            ),

        ];
    }
}
