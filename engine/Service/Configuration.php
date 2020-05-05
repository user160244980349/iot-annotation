<?php

namespace Engine\Service;

use Engine\Entity\ServiceBus;

/**
 * Configuration.php
 *
 * Service providing access to conf files.
 */
class Configuration
{

    /**
     * Get content of conf file.
     *
     * @param string $alias Service alias to get.
     * @access public.
     * @return mixed
     */
    public function get(string $alias)
    {
        return require ServiceBus::get('fsmap')->get($alias);
    }

}
