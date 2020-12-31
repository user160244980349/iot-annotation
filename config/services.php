<?php

use Engine\Config;

Config::set('services', [
    
    Engine\Packages\Debug\DebugService::class,
    Engine\Packages\Middleware\MiddlewareService::class,
    Engine\Packages\Session\SessionService::class,
    Engine\Packages\RawSQL\RawSQLService::class,
    Engine\Packages\Auth\AuthService::class,
    Engine\Packages\Redirection\RedirectionService::class,

]);
