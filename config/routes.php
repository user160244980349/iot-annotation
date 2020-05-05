<?php

/**
 * Patterns for parameters:
 *
 * ([0-9]+)      <- number
 * ([a-zA-Z]+)   <- word
 */

use App\Controller\Home;
use App\Controller\Login;
use App\Controller\Register;
use App\Controller\Welcome;

return [

    [   'name' => 'welcome.get',
        'method' => 'get',
        'pattern' => '/^$/',
        'controller' => [Welcome::class, 'toWelcomePage'] ],

    [   'name' => 'register.get',
        'method' => 'get',
        'pattern' => '/^register$/',
        'controller' => [Register::class, 'toRegisterPage'] ],

    [   'name' => 'register.post',
        'method' => 'post',
        'pattern' => '/^register$/',
        'controller' => [Register::class, 'register'] ],

    [   'name' => 'login.get',
        'method' => 'get',
        'pattern' => '/^login$/',
        'controller' => [Login::class, 'toLoginPage'] ],

    [   'name' => 'login.post',
        'method' => 'post',
        'pattern' => '/^login$/',
        'controller' => [Login::class, 'login'] ],

    [   'name' => 'home.get',
        'method' => 'get',
        'pattern' => '/^home$/',
        'controller' => [Home::class, 'toHomePage'] ],

    [   'name' => 'logout.post',
        'method' => 'post',
        'pattern' => '/^logout$/',
        'controller' => [Login::class, 'logout'] ],

];
