<?php

use Engine\Command;

return [

    # Migrations & seeds
    new Command('migrations.create', [Engine\Controllers\Migration::class, 'create']),
    new Command('migrations.do', [Engine\Controllers\Migration::class, 'do']),
    new Command('migrations.undo', [Engine\Controllers\Migration::class, 'undo']),
    new Command('migrations.reset', [Engine\Controllers\Migration::class, 'reset']),
    new Command('seeds.create', [Engine\Controllers\Seed::class, 'create']),
    new Command('seeds.do', [Engine\Controllers\Seed::class, 'do']),

    # Session
    new Command('sessions.clear', [Engine\Controllers\Session::class, 'clear'])

];
