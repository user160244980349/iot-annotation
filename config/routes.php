<?php

/**
* Patterns for parameters:
*
* ([0-9]+) <- number
* ([a-zA-Z]+) <- word
*/

return [

    'GET' => [
        # welcome route
        '/^$/'            => ['App\Core\Controller\Welcome', 'toWelcomePage'],
        # registration routes
        '/^register$/'    => ['App\Core\Controller\Register', 'toRegisterPage'],
        # login routes
        '/^login$/'       => ['App\Core\Controller\Login', 'toLoginPage'],
        # home route
        '/^home$/'        => ['App\Core\Controller\Home', 'toHomePage'],
    ],

    'POST' => [
        # do register
        '/^register$/'    => ['App\Core\Controller\Register', 'registerUser'],
        # do login
        '/^login$/'       => ['App\Core\Controller\Login', 'logUserIn'],
        # do logout
        '/^logout$/'      => ['App\Core\Controller\Login', 'logUserOut'],
    ],

    'PUT' => [

    ],

    'DELETE' => [

    ],

];
