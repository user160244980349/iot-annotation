<?php

use Engine\Decorators\Application;
use Engine\Decorators\ServiceBus;
use Engine\Services\Configuration;
use Engine\Services\Env;
use Engine\Services\FSMap;

# Call application
ServiceBus::register('env', new Env());
ServiceBus::register('fs_map', new FSMap());
ServiceBus::register('conf', new Configuration());
ServiceBus::autoload();
Application::run();

# Debug output
# dump(ServiceBus::instance());
