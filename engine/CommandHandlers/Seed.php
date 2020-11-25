<?php

namespace Engine\CommandHandlers;

use Engine\Decorators\Seed as S;

/**
 * Seed.php
 *
 * Command class to upload seeds.
 */
class Seed
{

    /**
     * Create seeds file.
     *
     * @access public
     * @param string $name - Seed`s name
     */
    public static function create(string $name): void
    {
        print("creating seed...\n");

        S::create($name);

        print("seed has been created.\n");
    }

    /**
     * Inserting seeds.
     *
     * @access public
     */
    public static function do(): void
    {
        print("uploading seeds...\n");

        S::do();

        print("seeds have been uploaded.\n");
    }

}
