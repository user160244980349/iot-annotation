<?php

namespace App\Core\Service;

use App\Core\ServiceBus;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Configuration
{

     /**
      * get content of conf file.
      *
      * @var string.
      * @access public.
      */
     public function get (string $alias) {
         return require ServiceBus::get('fsmap')->get($alias);
     }

}
