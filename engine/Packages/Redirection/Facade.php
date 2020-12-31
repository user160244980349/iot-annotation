<?php

namespace Engine\Packages\Redirection;

use Engine\Packages\ServiceBus;

/**
 * Redirection.php
 *
 * Redirection decorator.
 */
class Facade
{

    /**
     * Does redirection.
     *
     * @access public
     * @param string $uri
     */
    public static function redirect(string $uri): void
    {
        ServiceBus::instance()->get('redirection')->redirect($uri);
    }

}