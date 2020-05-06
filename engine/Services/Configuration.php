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
     * Gives content of conf file.
     *
     * @param string $alias Service alias to get.
     * @access public.
     * @return mixed.
     */
    public function get(string $alias)
    {
        return require_once(FSMap::get($alias));
    }

}
