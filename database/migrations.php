<?php

use Engine\Services\Migration;

Migration::register([
    Database\Migrations\users_05_02_2020_16_17_09::class,
    Database\Migrations\passwords_11_19_2020_03_57_28::class,
    Database\Migrations\permissions_05_05_2020_01_51_39::class,
    Database\Migrations\groups_05_05_2020_01_51_26::class,
    Database\Migrations\group_user_05_05_2020_02_00_43::class,
    Database\Migrations\group_permission_05_05_2020_02_00_35::class,
]);
