<?php

namespace Engine\Auth;

use Engine\ServiceFacade;

/**
 * Auth.php
 *
 * Decorator class for authentication.
 */
class Facade extends ServiceFacade
{
    public static $alias = 'auth';
}
