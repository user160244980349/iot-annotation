<?php

use App\Object\ServiceBus;
use App\Service\FSMap;
use App\Service\Configuration;

# Call application
ServiceBus::register('fsmap', new FSMap());
ServiceBus::register('conf', new Configuration());
ServiceBus::autoload();
ServiceBus::get('application')->run();

# test
# dump(ServiceBus::instance());
