<?php

use Engine\Packages\Debug\DebugService;
use Engine\Packages\Middleware\MiddlewareService;
use Engine\Packages\Session\SessionService;
use Engine\Packages\RawSQL\RawSQLService;
use Engine\Packages\Auth\AuthService;
use Engine\Packages\Redirection\RedirectionService;
use Engine\Config;

Config::set('services', [
    
    DebugService::class,
    MiddlewareService::class,
    SessionService::class,
    RawSQLService::class,
    AuthService::class,
    RedirectionService::class,

]);
