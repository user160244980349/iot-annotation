<?php

namespace Engine\Services;

use Engine\Service;

/**
 * Redirect.php
 *
 * Provide redirect.
 */
class RedirectionService extends Service
{

    /**
     * Alias for service.
     *
     * @var string
     */
    static public string $alias = 'redirection';

    /**
     * Performs redirection.
     *
     * @access protected
     * @param string $uri
     */
    protected function redirect(string $uri): void
    {
        header("location: $uri");
    }

}