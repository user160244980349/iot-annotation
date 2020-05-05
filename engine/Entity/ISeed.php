<?php

namespace Engine\Entity;

interface ISeed
{
    public static function up();

    public static function drop();
}