<?php

namespace Database\Migration;

use App\Core\ServiceBus;

class CreateUsersTable
{

    public static function create()
    {
        ServiceBus::get('database')
            ->query("create table 'users' ( .
                        id int,
                        name varchar(255),
                        password varchar(255),
                        email varchar(255),
                    )");
    }

    public static function drop()
    {
        ServiceBus::get('database')
            ->query("drop table 'users'");
    }

}
