<?php

namespace App\Core\Service;

use App\Core\ServiceBus;

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
      */
     public function get (string $alias) {
         return require ServiceBus::get('fsmap')->get($alias);
     }

}
