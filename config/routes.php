<?php

/**
 * Patterns for parameters:
 *
 * ([0-9]+)      <- number
 * ([a-zA-Z]+)   <- word
 */

return [

    ['name' => 'welcome.get',
        'method' => 'get',
        'pattern' => '/^$/',
        'controller' => ['App\Controllers\Welcome', 'toWelcomePage']],

    ['name' => 'register.get',
        'method' => 'get',
        'pattern' => '/^register$/',
        'controller' => ['App\Controllers\Register', 'toRegisterPage']],

    ['name' => 'register.post',
        'method' => 'post',
        'pattern' => '/^register$/',
        'controller' => ['App\Controllers\Register', 'register']],

    ['name' => 'login.get',
        'method' => 'get',
        'pattern' => '/^login$/',
        'controller' => ['App\Controllers\Login', 'toLoginPage']],

    ['name' => 'login.post',
        'method' => 'post',
        'pattern' => '/^login$/',
        'controller' => ['App\Controllers\Login', 'login']],

    ['name' => 'home.get',
        'method' => 'get',
        'pattern' => '/^home$/',
        'controller' => ['App\Controllers\Home', 'toHomePage']],

    ['name' => 'index-bp.get',
        'method' => 'get',
        'pattern' => '/^index-bp$/',
        'controller' => ['App\Controllers\ManageBP', 'toIndexPage']],

    ['name' => 'create-bp.get',
        'method' => 'get',
        'pattern' => '/^create-bp$/',
        'controller' => ['App\Controllers\ManageBP', 'toCreatePage']],

    ['name' => 'edit-bp.get',
        'method' => 'get',
        'pattern' => '/^edit-bp$/',
        'controller' => ['App\Controllers\ManageBP', 'toEditPage']],

    ['name' => 'index-users.get',
        'method' => 'get',
        'pattern' => '/^index-users$/',
        'controller' => ['App\Controllers\ManageGroups', 'toIndexPage']],

    ['name' => 'edit-groups.get',
        'method' => 'get',
        'pattern' => '/^edit-groups$/',
        'controller' => ['App\Controllers\ManageGroups', 'toEditPage']],

    ['name' => 'run-action.get',
        'method' => 'get',
        'pattern' => '/^run-action$/',
        'controller' => ['App\Controllers\ManageActions', 'toRunPage']],

    ['name' => 'view-action.get',
        'method' => 'get',
        'pattern' => '/^view-action$/',
        'controller' => ['App\Controllers\ManageActions', 'toDoPage']],

    ['name' => 'logout.post',
        'method' => 'post',
        'pattern' => '/^logout$/',
        'controller' => ['App\Controllers\Login', 'logout']],

];
