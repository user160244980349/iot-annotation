<?php

use Engine\Packages\Debug\DebugService;
use Engine\Packages\Middleware\MiddlewareService;
use Engine\Packages\Session\SessionService;
use Engine\Packages\RedBeanORM\RedBeanORMService;
use Engine\Packages\Auth\AuthService;
use Engine\Packages\Redirection\RedirectionService;
use Engine\Config;

Config::set('services', [
    
    DebugService::class,
    MiddlewareService::class,
    SessionService::class,
    RedBeanORMService::class,
    AuthService::class,
    RedirectionService::class,

]);
