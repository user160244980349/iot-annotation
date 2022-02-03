<?php

namespace Engine\Download;

use Engine\ServiceFacade;

/**
 * Session.php
 *
 * Decorator for sessions service.
 */
class Facade extends ServiceFacade
{
    public static $alias = 'download';
}
