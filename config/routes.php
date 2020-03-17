<?php

/**
* Patterns for parameters:
*
* ([0-9]+)      <- number
* ([a-zA-Z]+)   <- word
*/

return [

     [  'name'          => 'welcome.get',
        'method'        => 'get',
        'pattern'       => '/^$/',
        'controller'    => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name'          => 'home.get',
        'method'        => 'get',
        'pattern'       => '/^home$/',
        'controller'    => ['App\Core\Controller\Welcome', 'testSessions'] ],

     [  'name'          => 'logout.get',
        'method'        => 'get',
        'pattern'       => '/^logout$/',
        'controller'    => ['App\Core\Controller\Welcome', 'logout'] ],

     [  'name'          => 'register.get',
        'method'        => 'get',
        'pattern'       => '/^register$/',
        'controller'    => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name'          => 'register.post',
        'method'        => 'post',
        'pattern'       => '/^register$/',
        'controller'    => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name'          => 'login.get',
        'method'        => 'get',
        'pattern'       => '/^login$/',
        'controller'    => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name'          => 'login.post',
        'method'        => 'post',
        'pattern'       => '/^login$/',
        'controller'    => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name'          => 'logout.post',
        'method'        => 'post',
        'pattern'       => '/^logout$/',
        'controller'    => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

];
