<?php

namespace Engine\Decorators;

/**
 * Redirection.php
 *
 * Provide redirection.
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