<?php

namespace Engine\Services;

/**
 * Env.php
 *
 * Class managing access to env vars.
 */
class Env
{

    /**
     * Path to env file.
     *
     * @access private.
     * @var string.
     */
    private $_env;


    /**
     * Constructor for initialization.
     *
     * @access public.
     */
    public function __construct()
    {
        $this->_env = require(__DIR__ . '/../../env.php');
    }


    /**
     * Configuration file path.
     *
     * @access public.
     * @param string $alias.
     * @return mixed.
     */
    public function get(string $alias)
    {
        return $this->_env[$alias];
    }

}