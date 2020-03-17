<?php

namespace App\Core\Service;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Session
{
     /**
      * get content of conf file.
      *
      * @var string.
      * @access public.
      */
     public function __construct () {
         session_start();
     }

      /**
       * get content of conf file.
       *
       * @var string.
       * @access public.
       */
      public function set (string $name, $value) {
          $_SESSION[$name] = $value;
      }

       /**
        * get content of conf file.
        *
        * @var string.
        * @access public.
        */
       public function get (string $name) {
           return $_SESSION[$name];
       }

        /**
         * get content of conf file.
         *
         * @var string.
         * @access public.
         */
        public function destroy () {
            session_destroy();
        }

}
