<?php

use Engine\Debug\Facade as Debug;
use Engine\Middleware\Facade as Queue;
use Engine\Rendering\View;


# Call application
try {

    Queue::run();

} catch (PDOException | Exception | Error $exception) {

    Debug::push($exception);
    $view = new View('exception.php', ['exception' => $exception]);
    $view->display();

}