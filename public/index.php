<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

# Import composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

# Import part, that boots application up
require_once __DIR__ . '/../bootstrap/web_bootstrap.php';
