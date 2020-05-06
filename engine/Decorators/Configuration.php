<?php

namespace Engine\Decorators;

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
    public static function get(string $alias)
    {
        return ServiceBus::instance()->get('conf')->get($alias);
    }

}
