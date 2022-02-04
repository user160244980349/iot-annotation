<?php

namespace Engine\Services;

use App\Models\Password;
use App\Models\Permission;
use Engine\Service;
use Engine\Services\SessionService as Session;

/**
 * Auth.php
 *
 * Auth service.
 */
class CSRFService extends Service
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public string $alias = 'csrf';

    /**
     * Gives authorized user id.
     *
     * @access public
     * @return int
     */
    private string $_hash;

    /**
     * Gives authorized user id.
     *
     * @access public
     * @return int
     */
    protected function generate(): string
    {
        if (!isset($this->_hash)) {
            $this->_hash = md5(md5(rand()));
            Session::set('csrf', $this->_hash);
        }

        return $this->_hash;
    }

    /**
     * Gives authorized user id.
     *
     * @access public
     * @return int
     */
    protected function test(string $hash): bool
    {
        $stored_hash = Session::get('csrf');
        return $hash == $stored_hash;
    }

}
