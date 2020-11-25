<?php

namespace Engine\Services;


/**
 * Redirect.php
 *
 * Provide redirect.
 */
class Redirection
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