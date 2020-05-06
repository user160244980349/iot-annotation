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
     * @access public.
     * @param string $alias Service alias to get.
     * @return array.
     */
    public static function get(string $alias): array
    {
        return ServiceBus::instance()->get('conf')->get($alias);
    }

}
