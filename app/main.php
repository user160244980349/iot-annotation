<?php

# Important directories
$config = require_once 'config.php';

# Import composer autoloader
require_once $config['autoload'];

# Call application
$app = new App\Core\Application();