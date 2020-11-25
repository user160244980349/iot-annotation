<?php

use Engine\Services\Seed;

Seed::register([
    Database\Seeds\users_05_06_2020_17_17_34::class,
    Database\Seeds\passwords_11_19_2020_04_11_24::class,
    Database\Seeds\groups_05_06_2020_18_42_08::class,
    Database\Seeds\permissions_05_06_2020_18_42_13::class,
    Database\Seeds\group_permission_05_06_2020_18_42_18::class,
    Database\Seeds\group_user_05_06_2020_18_42_20::class,
]);