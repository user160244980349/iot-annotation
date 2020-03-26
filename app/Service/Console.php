<?php

namespace App\Service;

use App\Object\ServiceBus;

/**
 *
 */
class Console
{

    /**
     * Run command.
     *
     * @access public.
     */
    public function run (array $args)
    {

        $conf = ServiceBus::get('conf')->get('console');
        array_shift($args);
        $method = $args[0];
        array_shift($args);
        forward_static_call($conf[$method], ...$args);

        return;
    }

}
