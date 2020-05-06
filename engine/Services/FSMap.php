<?php

namespace Engine\Services;

use Engine\Decorators\Env;

/**
 * FSMap.php
 *
 * Provide access to important paths.
 */
class FSMap
{

    /**
     * Configuration file path.
     *
     * @access private.
     * @var array.
     */
    private $_root;

    /**
     * ServiceBus array.
     *
     * @access private.
     * @var array.
     */
    private $_paths;

    /**
     * FSMap constructor.
     *
     * @access public.
     */
    public function __construct()
    {
        $this->_root = Env::get('root');
        $this->_paths = Env::get('filesystem');
    }

    /**
     * Get path by alias.
     *
     * @access public.
     * @param string $alias.
     * @return string.
     */
    public function get(string $alias)
    {
        return $this->_root . $this->_paths[$alias];
    }

}
