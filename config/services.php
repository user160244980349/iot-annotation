<?php

use Engine\Debug\DebugService;
use Engine\Middleware\MiddlewareService;
use Engine\Session\SessionService;
use Engine\RawSQL\RawSQLService;
use Engine\Auth\AuthService;
use Engine\Redirection\RedirectionService;
use Engine\Config;

Config::set('services', [
    
    DebugService::class,
    MiddlewareService::class,
    SessionService::class,
    RawSQLService::class,
    AuthService::class,
    RedirectionService::class,

]);
