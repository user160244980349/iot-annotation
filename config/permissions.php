<?php

use Engine\Packages\Routing\RoutePermission;
use Engine\Config;

Config::set('permissions', [

    # Home page
    new RoutePermission('home', ['visit-home'])
    
]);
