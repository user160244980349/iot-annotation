<?php

namespace Engine\Services;

use Engine\Decorators\FSMap;

/**
 * Configuration.php
 *
 * Service providing access to conf files.
 */
class Configuration
{
    /**
     * Application run method.
     *
     * @var public
     */
    static public $alias = "configuration";

    /**
     * Gives content of conf file.
     *
     * @access public
     * @param string $alias Service alias to get
     * @return mixed
     */
    public function get(string $alias)
    {
        return require_once(FSMap::get($alias));
    }

}
