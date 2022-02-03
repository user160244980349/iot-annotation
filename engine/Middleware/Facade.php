<?php

namespace Engine\Middleware;

use Engine\ServiceFacade;

/**
 * MiddlewaresQueue.php
 *
 * MiddlewaresQueue service decorator.
 */
class Facade extends ServiceFacade
{
    public static $alias = 'middlewares_queue';
}
