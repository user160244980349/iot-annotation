<?php

namespace App\Core\Stages;

use App\Core\AppState;

/**
 * StageInterfacehp
 *
 * Interface to provide blocks, that can be iterated
 * like stages of response formation.
 */
interface StageInterface
{
    /**
     * Do some job.
     *
     * @param AppState $state Container to manage.
     * @return AppState Modified container.
     * @access public.
     */
    public function let (AppState $state);

}