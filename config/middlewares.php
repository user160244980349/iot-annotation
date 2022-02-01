<?php

use Engine\Receive\ReceiverNginxMiddleware;
use Engine\Routing\RouterMiddleware;
use Engine\Auth\AuthMiddleware;
use Engine\Middleware\Bundled\ControllerExecutionMiddleware;
use Engine\Rendering\RendererMiddleware;
use Engine\PostResponse\PostResponseMiddleware;
use Engine\Config;

Config::set('middlewares', [

    ReceiverNginxMiddleware::class,
    RouterMiddleware::class,
    AuthMiddleware::class,
    ControllerExecutionMiddleware::class,
    RendererMiddleware::class,
    PostResponseMiddleware::class,

]);