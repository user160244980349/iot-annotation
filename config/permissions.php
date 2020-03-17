<?php

/**
* Roles for methods:
*
* unauthorized
* regular
* admin
*/

return [

    # welcome route
    'welcome.get' => ['unauthorized'],
    # welcome route
    'register.get' => ['unauthorized'],
    # welcome route
    'register.post' => ['unauthorized'],
    # welcome route
    'login.get' => ['unauthorized'],
    # welcome route
    'login.post' => ['unauthorized'],
    # welcome route
    'welcome.get' => ['unauthorized'],
    # welcome route
    'home.get' => ['unauthorized'],
    # welcome route
    'logout.post' => ['unauthorized'],

];
