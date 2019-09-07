<?php

return [

    'GET' => [
        # welcome route
        '/^\/$/'            => ['App\Controller\WelcomeController', 'toWelcomePage'],
        # registration routes
        '/^\/register$/'    => ['App\Controller\RegisterController', 'toRegisterPage'],
        # login routes
        '/^\/login$/'       => ['App\Controller\LoginController', 'toLoginPage'],
        # home route
        '/^\/home$/'        => ['App\Controller\HomeController', 'toHomePage'],
    ],

    'POST' => [
        # do register
        '/^\/register$/'    => ['App\Controller\RegisterController', 'registerUser'],
        # do login
        '/^\/login$/'       => ['App\Controller\LoginController', 'logUserIn'],
        # do logout
        '/^\/logout$/'      => ['App\Controller\LoginController', 'logUserOut'],
    ],

    'PUT' => [

    ],

    'DELETE' => [

    ],

];