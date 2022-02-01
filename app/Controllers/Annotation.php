<?php

namespace App\Controllers;

use App\Models\Policy;
use App\Models\Selection;
use Engine\Redirection\Facade as Redirection;
use Engine\Session\Facade as Session;
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
        $policy = Policy::getOne();
        Session::set('policy_hash', $policy['hash']);
        $request->view = new View('annotation.php', [
            'title' => 'Annotation',
            'id' => Auth::authenticated(),
            'policy' => $policy,
        ]);
    }

    /**
     * Goes to annotation page.
     *
     * @access public
     * @param Request $request
     */
    public static function processAnnotations(Request $request)
    {   
        Redirection::redirect('/home');

        $id = Auth::authenticated();
        $hash = Session::get('policy_hash');

        $request->post_response = function () use ($request, $id, $hash) {

            $annotations = json_decode($request->parameters['json']);

            $portion = 100;
            $rows = [];
            foreach ($annotations as $annotation) {

                $rows[] = [
                    'starts_on'       => $annotation->selection->sc,
                    'ends_on'         => $annotation->selection->ec,
                    'selection_class' => $annotation->metaLayer->label,
                    'user_id'         => $id,
                    'policy_hash'     => $hash,
                ];

                if ($portion-- < 1) {
                    Selection::create($rows);

                    $portion = 100;
                    $rows = [];
                }
            }

            Selection::create($rows);
        };

    }

}
