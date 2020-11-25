<?php

use Engine\Decorators\Application;
use Engine\Decorators\ServiceBus;
use Engine\Decorators\Debug;
use Engine\View;

# Call application
try {
    ServiceBus::autoload();
    Application::run();
} catch (Error $exception) {
    Debug::push($exception);
    $view = new View('exception.php', ["exception" => $exception]);
    $view->display();
}

Debug::printIfAllowed();