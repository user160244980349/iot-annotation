<?php

use Engine\Packages\Routing\RoutePermission;
use Engine\Config;

Config::set('permissions', [

    # Home page
    new RoutePermission('home', ['visit-home']),
    new RoutePermission('annotation', ['visit-home']),
    new RoutePermission('users', ['manage-users']),
    new RoutePermission('user-group', ['manage-users']),
    new RoutePermission('user-groups', ['manage-users']),
    new RoutePermission('groups', ['manage-groups']),
    new RoutePermission('group-permission', ['manage-groups']),
    new RoutePermission('group-permissions', ['manage-groups']),
    
]);
