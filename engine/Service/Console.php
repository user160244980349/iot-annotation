<?php

namespace Engine\Service;

use Engine\Entity\ServiceBus;

/**
 *
 */
class Console
{

    /**
     * Run command.
     *
     * @access public.
     * @param array $args.
     */
    public function run(array $args)
    {

        $conf = ServiceBus::get('conf')->get('console');
        array_shift($args);
        $method = $args[0];
        array_shift($args);
        forward_static_call($conf[$method], ...$args);

        return;
    }

}
