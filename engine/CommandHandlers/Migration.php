<?php

namespace Engine\CommandHandlers;

use Engine\Decorators\Migration as M;

/**
 * Migration.php
 *
 * Command class to deploy RawSQL schemes.
 */
class Migration
{

    /**
     * Create tables.
     *
     * @access public
     * @param string $name - Migration`s name
     */
    public static function create(string $name): void
    {
        print('creating migration...\n');

        M::create($name);

        print("migration has been created.\n");
    }

    /**
     * Creates tables.
     *
     * @access public
     */
    public static function do(): void
    {
        print("setting up migrations...\n");

        M::do();
        
        print("migrations have been set up.\n");
    }

    /**
     * Drops tables.
     *
     * @access public
     */
    public static function undo(): void
    {
        print("reverting migrations...\n");

        M::undo();
        
        print("all migrations have been reverted.\n");
    }

    /**
     * Drops tables and up them again with seeding.
     *
     * @access public
     */
    public static function reset(): void
    {
        print("resetting migrations...\n");
        
        M::reset();

        print("all migrations have been reset.\n");
    }
    
}