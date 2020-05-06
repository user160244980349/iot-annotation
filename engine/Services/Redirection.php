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
     * Performs redirection.
     *
     * @access public.
     * @param string $uri .
     */
    public function redirect(string $uri): void
    {
        header("location: $uri");
        exit;
    }

}