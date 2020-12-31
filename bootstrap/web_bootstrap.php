<?php

use Engine\Packages\Debug\Facade as Debug;
use Engine\Packages\Middleware\Facade as Queue;
use Engine\Packages\Rendering\View;

# Call application
try {

    Queue::run();

} catch (PDOException | Exception | Error $exception) {

    Debug::push($exception);
    $view = new View('exception.php', ['exception' => $exception]);
    $view->display();

}

Debug::printIfAllowed();