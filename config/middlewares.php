<?php

use Engine\Config;

Config::set('middlewares', [

    Engine\Packages\Receive\ReceiverNginxMiddleware::class,
    Engine\Packages\Routing\RouterMiddleware::class,
    Engine\Packages\Auth\AuthMiddleware::class,
    Engine\Packages\Middleware\Bundled\ControllerExecutionMiddleware::class,
    Engine\Packages\Rendering\RendererMiddleware::class,

]);