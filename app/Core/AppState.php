<?php

namespace App\Core;

/**
 * DialogContainer.php
 *
 * Container, that will flow through services and controller
 * to gather data, necessary to response.
 */
class AppState
{
    /**
     * Variable provides request info.
     *
     * @var Request.
     * @access public.
     */
    public $request;

    /**
     * Variable contains session.
     *
     * @var PhpSession.
     * @access public.
     */
    public $session;

    /**
     * Variable provides database connect.
     *
     * @var array.
     * @access public.
     */
    public $database;

    /**
     * Variable provides controller call.
     *
     * @var ControllerCall.
     * @access public.
     */
    public $controllerCall;

    /**
     * Store data objects to operate.
     *
     * @var array.
     * @access public.
     */
    public $dataObjects;

    /**
     * Variable provides response info.
     *
     * @var array.
     * @access public.
     */
    public $response;

    /**
     * AppState constructor.
     *
     * @access public.
     */
    public function __construct ()
    {
        $this->request = new Request();
        $this->session = new PhpSession();
        $this->database = new Database();
        $this->dataObjects = [];
        $this->response = [];
    }

    /**
     * AppState destruct.
     *
     * @access public.
     */
    public function __destruct ()
    {
        $this->request = null;
        $this->session = null;
        $this->database = null;
        $this->dataObjects = null;
        $this->response = null;
    }

}