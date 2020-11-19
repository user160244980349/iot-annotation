<?php

use Engine\Decorators\Console;
use Engine\Decorators\ServiceBus;
use Engine\Services\Configuration;
use Engine\Services\Env;
use Engine\Services\FSMap;

# Call application
ServiceBus::register('env', new Env());
ServiceBus::register('fs_map', new FSMap());
ServiceBus::register('conf', new Configuration());
ServiceBus::autoload();
Console::run($argv);
