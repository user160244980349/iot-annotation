<?php

use Engine\ServiceBus;

ServiceBus::register([
    
    Engine\Services\Debug::class,
    Engine\Services\MiddlewaresQueue::class,
    Engine\Services\Session::class,
    Engine\Services\RawSQL::class,
    Engine\Services\Auth::class,
    Engine\Services\Console::class,
    Engine\Services\Redirection::class,
    Engine\Services\Migration::class,
    Engine\Services\Seed::class,

]);
