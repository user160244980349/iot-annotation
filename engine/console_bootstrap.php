<?php

use Engine\Entity\ServiceBus;
use Engine\Service\Configuration;
use Engine\Service\FSMap;

# Call application
ServiceBus::register('fsmap', new FSMap());
ServiceBus::register('conf', new Configuration());
ServiceBus::autoload();
ServiceBus::get('console')->run($argv);

# test
# dump(ServiceBus::instance());
