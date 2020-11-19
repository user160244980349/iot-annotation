<?php

return [

    # Migrations & seeds
    'migrations.create' => ['Engine\Controllers\Migration', 'create'],
    'migrations.do' => ['Engine\Controllers\Migration', 'do'],
    'migrations.undo' => ['Engine\Controllers\Migration', 'undo'],
    'migrations.reset' => ['Engine\Controllers\Migration', 'reset'],
    'seeds.create' => ['Engine\Controllers\Seed', 'create'],
    'seeds.do' => ['Engine\Controllers\Seed', 'do'],

    # Session
    'sessions.clear' => ['Engine\Controllers\Session', 'clear'],

];
