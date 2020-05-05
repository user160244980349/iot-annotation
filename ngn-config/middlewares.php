<?php

return [

    Engine\Middleware\Receiver::class,
    Engine\Middleware\Router::class,
    Engine\Middleware\Auth::class,
    Engine\Middleware\ControllerExecution::class,
    Engine\Middleware\Renderer::class,

];
