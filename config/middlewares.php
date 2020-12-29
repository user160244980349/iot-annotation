<?php

return [

    Engine\Middlewares\ReceiverNginx::class,
    Engine\Middlewares\Router::class,
    Engine\Middlewares\Auth::class,
    Engine\Middlewares\ControllerExecution::class,
    Engine\Middlewares\Renderer::class,

];