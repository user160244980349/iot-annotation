<?php

use Engine\Decorators\ServiceBus;
use Engine\Services\Configuration;
use Engine\Services\Env;
use Engine\Services\FSMap;

# Call application
ServiceBus::register('env', new Env());
ServiceBus::register('fs_map', new FSMap());
ServiceBus::register('conf', new Configuration());
ServiceBus::autoload();
ServiceBus::get('application')->run();

# Debug output
# dump(ServiceBus::instance());
