<?php

namespace Engine\Services;

use Engine\ServiceBus;

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
     * @return mixed
     */
    public function get(string $alias)
    {
        return require_once(ServiceBus::get('fs_map')->get($alias));
    }

}
