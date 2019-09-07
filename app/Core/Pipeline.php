<?php

namespace App\Core;

/**
 * Pipeline.php
 *
 * Class, that contains core services important for application work.
 */
class Pipeline
{
    /**
     * Services providing different functions.
     *
     * @var array.
     * @access private.
     */
    private $_services;

    /**
     * Iterate all services as a chain.
     *
     * @return AppState Modified container.
     * @access public.
     */
    public function run ()
    {
        $result = null;
        foreach ($this->_services as $element) {
            $result = $element->let($result);
        }

        return $result;
    }

    /**
     * Pipeline constructor.
     *
     * @param array $sequencedServices Sequenced services.
     * @access public.
     */
    public function __construct (array $sequencedServices)
    {
        $this->_services = $sequencedServices;
    }

    /**
     * Pipeline destructor.
     *
     * @access public.
     */
    public function __destruct ()
    {
        $this->_services = null;
    }

}