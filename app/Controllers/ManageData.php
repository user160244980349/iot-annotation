<?php

namespace App\Controllers;

use App\Models\Data;
use Engine\Config;
use Engine\Auth\Facade as Auth;
use Engine\Receive\Request;
use Engine\Rendering\View;
use Engine\Redirection\Facade as Redirection;
use ZipArchive;

/**
 * Annotation.php
 *
 * Controller class for loading annotation page.
 */
class ManageData
{

    /**
     * Goes to annotation page.
     *
     * @access public
     * @param Request $request
     */
    public static function toDataPage(Request $request)
    {
        $id = Auth::authenticated();

        $request->view = new View('data.php', [
            'title' => 'Data',
            'id' => $id,
        ]);
    }

    public static function upload(Request $request)
    {
        $tmp_file = $request->parameters['files']['data']['tmp_name'];
        $path = Config::get('env')['tmp'] . '/' . md5(rand());
        $base = $path . '/iot-dataset';
        $file = $path . '.zip';

        move_uploaded_file($tmp_file, $file);
        $zip = new ZipArchive;
        if ($zip->open($file) === TRUE) {
            $zip->extractTo($path);
            $zip->close();
        }
        unlink($file);

        $json = json_decode(file_get_contents($base  . '/json/plain.json'), true);
        Data::create($base, $json);

        Redirection::redirect("/data");
    }

    public static function download(Request $request)
    {
        
    }

}
