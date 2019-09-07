<?php

namespace App\Core;

/**
 * Session.php
 *
 * Class Session, manage sessions.
 */
class PhpSession
{
    /**
     * Global $_SESSION variable.
     *
     * @var array.
     * @access private.
     */
    private $variables;

    /**
     * Is session initialized?
     *
     * @return bool.
     * @access public.
     */
    public function exists ()
    {
        return isset($this->variables);
    }

    /**
     * Load session variable.
     *
     * @return void.
     * @access public.
     */
    public function load ()
    {
        $this->variables = $_SESSION;
    }

    /**
     * Store session variable.
     *
     * @return void.
     * @access public.
     */
    public function store ()
    {
        $_SESSION = $this->variables;
    }

    /**
     * Get session value.
     *
     * @param string $var.
     * @param mixed $out.
     * @return bool.
     * @access public.
     */
    public function get ($var, &$out)
    {
        if (isset($this->variables[$var])) {
            $out = $this->variables[$var];
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set session value.
     *
     * @param string $var.
     * @param mixed $value.
     * @return void.
     * @access public.
     */
    public function set ($var, $value)
    {
        $this->variables[$var] = $value;
    }

    /**
     * Set session value.
     *
     * @param string $var.
     * @return bool.
     * @access public.
     */
    public function contains ($var)
    {
        return isset($this->variables[$var]);
    }

    /**
     * Destroy session.
     *
     * @return void.
     * @access public.
     */
    public function destroy ()
    {
        session_destroy();
    }

    /**
     * PhpSession constructor
     *
     * @return void.
     * @access public.
     */
    public function __construct ()
    {
        session_start();
        $this->load();
    }

    /**
     * PhpSession destructor.
     *
     * @return void.
     * @access public.
     */
    public function __destruct ()
    {
        $this->store();
    }

}