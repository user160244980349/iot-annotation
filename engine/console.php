<?php

return [

    'migrate.create'    => ['Engine\Command\Migrate', 'create'],
    'migrate.do'        => ['Engine\Command\Migrate', 'do'],
    'migrate.undo'      => ['Engine\Command\Migrate', 'undo'],

    'session.clear'     => ['Engine\Command\Session', 'clear'],

    'seed.create'       => ['Engine\Command\Seed', 'create'],
    'seed.do'           => ['Engine\Command\Seed', 'do'],

];
