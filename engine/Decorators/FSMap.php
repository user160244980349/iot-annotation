<?php

namespace Engine\Decorators;

use Engine\ServiceBus;

/**
 * FSMap.php
 *
 * Provide access to important paths.
 */
class FSMap
{

    /**
     * Get path by alias.
     *
     * @access public.
     * @param string $alias .
     * @return string.
     */
    public static function get(string $alias): string
    {
        return ServiceBus::instance()->get('fs_map')->get($alias);
    }

}
