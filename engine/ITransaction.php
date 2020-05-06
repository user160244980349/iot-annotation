<?php

namespace Engine;

interface ITransaction
{
    public static function commit();
    public static function revert();
}