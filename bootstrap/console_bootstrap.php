<?php

use Engine\Decorators\Console;
use Engine\Decorators\ServiceBus;

# Call application
ServiceBus::autoload();
Console::run($argv);
