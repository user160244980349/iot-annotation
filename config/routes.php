<?php

/**
* Patterns for parameters:
*
* ([0-9]+)      <- number
* ([a-zA-Z]+)   <- word
*/

return [

     [  'name' => 'welcome.get',
        'method' => 'GET',
        'pattern' => '/^$/',
        'controller' => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name' => 'register.get',
        'method' => 'GET',
        'pattern' => '/^register$/',
        'controller' => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name' => 'register.post',
        'method' => 'POST',
        'pattern' => '/^register$/',
        'controller' => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name' => 'login.get',
        'method' => 'GET',
        'pattern' => '/^login$/',
        'controller' => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name' => 'login.post',
        'method' => 'POST',
        'pattern' => '/^login$/',
        'controller' => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name' => 'home.get',
        'method' => 'GET',
        'pattern' => '/^home$/',
        'controller' => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

     [  'name' => 'logout.post',
        'method' => 'POST',
        'pattern' => '/^logout$/',
        'controller' => ['App\Core\Controller\Welcome', 'toWelcomePage'] ],

];
