<?php

return [

    # Migrations & seeds
    'migrations.create' => ['Engine\Commands\Migration', 'create'],
    'migrations.do' => ['Engine\Commands\Migration', 'do'],
    'migrations.revert' => ['Engine\Commands\Migration', 'revert'],
    'migrations.revert_all' => ['Engine\Commands\Migration', 'revert_all'],
    'seeds.create' => ['Engine\Commands\Seed', 'create'],
    'seeds.do' => ['Engine\Commands\Seed', 'do'],

    # Session
    'sessions.clear' => ['Engine\Commands\Session', 'clear'],

];
