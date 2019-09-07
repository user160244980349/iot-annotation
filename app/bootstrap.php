<?php

# Important directories
$config = require_once 'config.php';

# Import composer autoloader
require __DIR__ . '/../vendor/autoload.php';

# Call application
$app = new App\Core\Application();