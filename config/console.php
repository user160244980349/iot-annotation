<?php

use Engine\Command;

return [

    # Migrations & seeds
    new Command('migrations.create', [Engine\CommandHandlers\Migration::class, 'create']),
    new Command('migrations.do', [Engine\CommandHandlers\Migration::class, 'do']),
    new Command('migrations.undo', [Engine\CommandHandlers\Migration::class, 'undo']),
    new Command('migrations.reset', [Engine\CommandHandlers\Migration::class, 'reset']),
    new Command('seeds.create', [Engine\CommandHandlers\Seed::class, 'create']),
    new Command('seeds.do', [Engine\CommandHandlers\Seed::class, 'do']),

    # Session
    new Command('sessions.clear', [Engine\CommandHandlers\Session::class, 'clear'])

];
