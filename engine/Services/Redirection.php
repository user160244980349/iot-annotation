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
     * Application run method.
     *
     * @var public
     */
    static public $alias = "redirection";

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