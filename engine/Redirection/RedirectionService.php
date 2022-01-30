<?php

namespace Engine\Redirection;

/**
 * Redirect.php
 *
 * Provide redirect.
 */
class RedirectionService
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public string $alias = 'redirection';

    /**
     * Performs redirection.
     *
     * @access public
     * @param string $uri
     */
    public function redirect(string $uri): void
    {
        header("location: $uri");
        exit;
    }

}