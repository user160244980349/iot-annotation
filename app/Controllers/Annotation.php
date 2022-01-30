<?php

namespace App\Controllers;

use App\Models\Data;
use Engine\Auth\Facade as Auth;
use Engine\Receive\Request;
use Engine\Rendering\View;
use Engine\RedBeanORM\Facade as R;

/**
 * Annotation.php
 *
 * Controller class for loading annotation page.
 */
class Annotation
{

    /**
     * Goes to annotation page.
     *
     * @access public
     * @param Request $request
     */
    public static function toAnnotationPage(Request $request)
    {   
        $request->view = new View('annotation.php', [
            'title' => 'Annotation',
            'id' => Auth::authenticated(),
            'policy' => Data::getOne(),
        ]);
    }

}
