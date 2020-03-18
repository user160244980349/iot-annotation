<?php

namespace App\Core\Service;

/**
 * FSMap.php
 *
 * Provide access to important paths.
 */
class FSMap
{

     /**
      * Configuration file path.
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
      * FSMap constructor.
      *
      * @access public.
      */
     public function __construct () {
         $this->_paths = require_once self::$_conf_path;
     }

     /**
      * Get path by alias.
      *
      * @param string $alias.
      * @access public.
      */
     public function get (string $alias) {
         return $this->_paths[$alias];
     }

}
