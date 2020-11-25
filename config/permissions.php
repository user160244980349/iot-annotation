<?php

use Engine\RoutePermission;
use Engine\Middlewares\Auth;

Auth::register([

    # Home page
    new RoutePermission('home', ['visit-home'])
    
]);
