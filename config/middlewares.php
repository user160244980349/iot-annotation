<?php

use Engine\Packages\Receive\ReceiverNginxMiddleware;
use Engine\Packages\Routing\RouterMiddleware;
use Engine\Packages\Auth\AuthMiddleware;
use Engine\Packages\Middleware\Bundled\ControllerExecutionMiddleware;
use Engine\Packages\Rendering\RendererMiddleware;
use Engine\Config;

Config::set('middlewares', [

    ReceiverNginxMiddleware::class,
    RouterMiddleware::class,
    AuthMiddleware::class,
    ControllerExecutionMiddleware::class,
    RendererMiddleware::class,

]);