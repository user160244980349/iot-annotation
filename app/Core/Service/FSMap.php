<?php

namespace App\Core\Service;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class FSMap
{
     /**
      * ServiceBus array.
      *
      * @var array.
      * @access private.
      */
     private static $_conf_path = __DIR__ . '/../../../config/fsmap.php';

      /**
       * ServiceBus array.
       *
       * @var array.
       * @access private.
       */
      private $_paths;

     /**
      * get path to conf file.
      *
      * @var string.
      * @access public.
      */
     public function __construct () {
         $this->_paths = require_once self::$_conf_path;
     }

     /**
      * get path to conf file.
      *
      * @var string.
      * @access public.
      */
     public function get (string $alias) {
         return $this->_paths[$alias];
     }

}
