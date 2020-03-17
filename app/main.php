<?php

namespace App;

use App\Core\ServiceBus;
use App\Core\Service\FSMap;
use App\Core\Service\Configuration;

# Call application
ServiceBus::instance()->register('fsmap', new FSMap());
ServiceBus::instance()->register('conf', new Configuration());
ServiceBus::instance()->autoload();
ServiceBus::instance()->get('application')->run();

# test
dump(ServiceBus::instance());
