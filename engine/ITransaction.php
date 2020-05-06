<?php

namespace Engine;

/**
 * ITransaction.php
 *
 * Transaction for database.
 */
interface ITransaction
{

    /**
     * Commits transaction.
     *
     * @access public
     * @return Request Modified container
     */
    public static function commit();

    /**
     * Reverts transaction.
     *
     * @access public
     * @return Request Modified container
     */
    public static function revert();

}