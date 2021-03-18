<?php

use Engine\Config;
use Engine\Packages\Debug\Facade as Debug;
use Engine\Packages\Middleware\Facade as Queue;
use Engine\Packages\Rendering\View;

if (Config::get('debug')) {
    
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

}

# Call application
try {

    Queue::run();

} catch (PDOException | Exception | Error $exception) {

    Debug::push($exception);
    $view = new View('exception.php', ['exception' => $exception]);
    $view->display();

}

Debug::printIfAllowed();