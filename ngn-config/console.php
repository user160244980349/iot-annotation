<?php

return [

    'migration.create' => [Engine\Command\Migration::class, 'create'],
    'migration.do' => [Engine\Command\Migration::class, 'do'],
    'migration.revert_all' => [Engine\Command\Migration::class, 'revert_all'],

    'session.clear' => [Engine\Command\Session::class, 'clear'],

    'seed.create' => [Engine\Command\Seed::class, 'create'],
    'seed.do' => [Engine\Command\Seed::class, 'do'],

];
