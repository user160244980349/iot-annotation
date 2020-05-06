<?php

namespace Engine\Decorators;

use Engine\ServiceBus;

/**
 * Env.php
 *
 * Class managing access to env vars.
 */
class Env
{

    /**
     * Configuration file path.
     *
     * @access public
     * @param string $alias
     * @return mixed
     */
    public static function get(string $alias)
    {
        return ServiceBus::instance()->get('env')->get($alias);
    }

}