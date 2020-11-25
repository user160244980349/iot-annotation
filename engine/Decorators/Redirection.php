<?php

namespace Engine\Decorators;

use Engine\ServiceBus;


/**
 * Redirection.php
 *
 * Redirection decorator.
 */
class Redirection
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