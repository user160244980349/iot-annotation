<?php

namespace Engine\Entity;

interface IMigration
{
    public static function up();

    public static function drop();
}