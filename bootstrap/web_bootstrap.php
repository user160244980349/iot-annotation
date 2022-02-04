<?php

use Engine\Services\DebugService as Debug;
use Engine\Services\MiddlewareService as Queue;
use Engine\View;


# Call application
try {

    Queue::run();

} catch (PDOException | Exception | Error $exception) {

    Debug::push($exception);
    $view = new View('exception.php', ['exception' => $exception]);
    $view->display();

}