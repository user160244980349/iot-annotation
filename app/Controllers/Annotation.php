<?php

namespace App\Controllers;

use Engine\Packages\Auth\Facade as Auth;
use Engine\Packages\Receive\Request;
use Engine\Packages\Rendering\View;
use Engine\Packages\RedBeanORM\Facade as R;

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
        $id = Auth::authenticated();

        $request->view = new View('annotation.php', [
            'title' => 'Annotation',
            'id' => $id,
            'text' => R::get()::getCell("SELECT `content` FROM `texts` ORDER BY RAND() LIMIT 1;"),
        ]);
    }

}
