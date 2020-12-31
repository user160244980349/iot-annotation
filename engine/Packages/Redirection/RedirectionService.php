<?php

namespace Engine\Packages\Redirection;

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
    static public $alias = 'redirection';

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