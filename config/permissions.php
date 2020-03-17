<?php

/**
* Roles for methods:
*
* - unauthorized
* - regular
* - admin
*/

return [

    # welcome route
    'welcome.get'       => ['unauthorized'],
    # register route
    'register.get'      => ['unauthorized'],
    # register route
    'register.post'     => ['unauthorized'],
    # login route
    'login.get'         => ['unauthorized'],
    # login route
    'login.post'        => ['unauthorized'],
    # home route
    'home.get'          => ['unauthorized'],
    # logout route
    'logout.post'       => ['unauthorized'],

];
