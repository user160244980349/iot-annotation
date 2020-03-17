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
     * ServiceBus array.
     *
     * @var array.
     * @access public.
     */
    private $_content;

     /**
      * get content of conf file.
      *
      * @var string.
      * @access public.
      */
     public function __construct () {

         session_start();
         $this->_content = $_SESSION;

     }

      /**
       * get content of conf file.
       *
       * @var string.
       * @access public.
       */
      public function set () {

      }

       /**
        * get content of conf file.
        *
        * @var string.
        * @access public.
        */
       public function get () {

       }

}
