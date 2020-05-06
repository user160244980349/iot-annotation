<?php

namespace Engine;

use Engine\Decorators\Configuration;
use Error;

/**
 * MediatorsQueue.php
 *
 * Class, that contains core mediators important for application work.
 */
class MediatorsQueue
{
    /**
     * Mediators providing different functions.
     *
     * @access private.
     * @var array.
     */
    private $_mediators;

    /**
     * Queue constructor.
     *
     * @access public.
     */
    public function __construct()
    {
        $mediators = Configuration::get('mediators');
        $this->_mediators = [];
        foreach ($mediators as $mediator) {
            array_push($this->_mediators, new $mediator());
        }
    }

    /**
     * Iterate all mediators as a chain.
     *
     * @access public.
     * @return Request Modified container.
     */
    public function run(): Request
    {
        $result = null;

        try {

            foreach ($this->_mediators as $_middleware) {
                $result = $_middleware->let($result);
            }

        } catch (Error $exception) {
            $fallbackMediators = Configuration::get('mediators_fallback');
            $this->_mediators = [];
            foreach ($fallbackMediators as $mediator) {
                array_push($this->_mediators, new $mediator());
            }

            $result->route = new Route ('error', ['App\Controllers\ExceptionHandler', 'handle'], [$exception]);
            foreach ($this->_mediators as $_middleware) {
                $result = $_middleware->let($result);
            }
        }

        return $result;
    }

}
