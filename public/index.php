<?php

# Get paths
$fsmap = require_once '../config/fsmap.php';

# Import composer autoloader
require_once $fsmap['autoload'];

# Import part, that boots application up
require_once $fsmap['main'];
