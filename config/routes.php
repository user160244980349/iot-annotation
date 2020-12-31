<?php

/**
 * Patterns for parameters:
 *
 * (0-9+)      <- number
 * (a-zA-Z+)   <- word
 */

use App\Controllers\Register;
use App\Controllers\Login;
use App\Controllers\Home;
use App\Controllers\Welcome;
use App\Controllers\ManageBusinessProcesses;
use App\Controllers\ManageUsers;
use App\Controllers\ManageTasks;
use App\Controllers\ManageGroups;
use Engine\Packages\Routing\Route;
use Engine\Config;


Config::set('routes', [

    # Auth management
    new Route('register', 'get', '/^\/register$/', [Register::class, 'toRegisterPage']),
    new Route('register', 'post', '/^\/register$/', [Register::class, 'register']),
    new Route('login', 'get', '/^\/login$/', [Login::class, 'toLoginPage']),
    new Route('login', 'post', '/^\/login$/', [Login::class, 'login']),
    new Route('logout', 'post', '/^\/logout$/', [Login::class, 'logout']),

    # Pages
    new Route('welcome', 'get', '/^\/$/', [Welcome::class, 'toWelcomePage']),
    new Route('home', 'get', '/^\/home$/', [Home::class, 'toHomePage']),

    # Business processes
    new Route('business-processes', 'get', '/^\/business_processes$/', [ManageBusinessProcesses::class, 'toIndexPage']),
    new Route('business-processes', 'delete', '/^\/business_processes$/', [ManageBusinessProcesses::class, 'delete']),
    new Route('create-business-process', 'get', '/^\/create_business_process$/', [ManageBusinessProcesses::class, 'toCreatePage']),
    new Route('update-business-process', 'get', '/^\/update_business_process\/([0-9]+)$/', [ManageBusinessProcesses::class, 'toUpdatePage']),

    # Users
    new Route('users', 'get', '/^\/users$/', [ManageUsers::class, 'toUsersPage']),
    new Route('user-groups', 'get', '/^\/users\/([0-9]+)\/groups$/', [ManageUsers::class, 'toGroupsPage']),
    new Route('user-group', 'post', '/^\/users\/([0-9]+)\/groups$/', [ManageUsers::class, 'assign']),
    new Route('user-group', 'delete', '/^\/users\/([0-9]+)\/groups$/', [ManageUsers::class, 'disassign']),

    # Tasks
    new Route('run-task', 'get', '/^\/run_task$/', [ManageTasks::class, 'toRunPage']),
    new Route('task', 'get', '/^\/task\/([0-9]+)$/', [ManageTasks::class, 'toDoPage']),

    # Permissions
    new Route('groups', 'get', '/^\/groups$/', [ManageGroups::class, 'toGroupsPage']),
    new Route('group-permissions', 'get', '/^\/groups\/([0-9]+)\/permissions$/', [ManageGroups::class, 'toPermissionsPage']),
    new Route('group-permissions', 'post', '/^\/groups\/([0-9]+)\/permissions$/', [ManageGroups::class, 'assign']),
    new Route('group-permission', 'delete', '/^\/groups\/([0-9]+)\/permissions$/', [ManageGroups::class, 'disassign']),

]);