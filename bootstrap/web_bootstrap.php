<?php

use Engine\Decorators\Application;
use Engine\Decorators\ServiceBus;
use Engine\Services\Configuration;
use Engine\Services\Env;
use Engine\Services\FSMap;


ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

# Call application
ServiceBus::register("env", new Env());
ServiceBus::register("fs_map", new FSMap());
ServiceBus::register("conf", new Configuration());
ServiceBus::autoload();
Application::run();