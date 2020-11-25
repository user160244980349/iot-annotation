<?php

use Engine\Services\MiddlewaresQueue;

return [

    Engine\Middlewares\Receiver::class,
    Engine\Middlewares\Router::class,
    Engine\Middlewares\Auth::class,
    Engine\Middlewares\ControllerExecution::class,
    Engine\Middlewares\Renderer::class,

];