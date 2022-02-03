<?php

namespace Engine\RawSQL;

use Engine\ServiceFacade;

/**
 * RawSQL.php
 *
 * Decorator for database tool.
 */
class Facade extends ServiceFacade
{
    public static $alias = 'database';
}
