<?php

return [

    'GET' => [
        # welcome route
        '/^\/$/'            => ['App\Controller\Welcome', 'toWelcomePage'],
        # registration routes
        '/^\/register$/'    => ['App\Controller\Register', 'toRegisterPage'],
        # login routes
        '/^\/login$/'       => ['App\Controller\Login', 'toLoginPage'],
        # home route
        '/^\/home$/'        => ['App\Controller\Home', 'toHomePage'],
    ],

    'POST' => [
        # do register
        '/^\/register$/'    => ['App\Controller\Register', 'registerUser'],
        # do login
        '/^\/login$/'       => ['App\Controller\Login', 'logUserIn'],
        # do logout
        '/^\/logout$/'      => ['App\Controller\Login', 'logUserOut'],
    ],

    'PUT' => [

    ],

    'DELETE' => [

    ],

];
