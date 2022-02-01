<?php

namespace App\Controllers;

use App\Models\Selection;
use App\Models\Policy;
use App\Models\Product;
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
     * Recursively removes directory content.
     *
     * @access private
     * @param $directory - Directory to delete
     * @param null $delete_parent - Recursive argument
     */
    private static function _rrmdir($directory, $delete_parent = True): void
    {
        $files = glob($directory . "/{,.}[!.,!..]*", GLOB_MARK | GLOB_BRACE);
        foreach ($files as $file) {
            if (is_dir($file)) {
                static::_rrmdir($file, True);
            } else {
                unlink($file);
            }
        }
        if ($delete_parent) {
            rmdir($directory);
        }
    }

    /**
     * Goes to annotation page.
     *
     * @access public
     * @param Request $request
     */
    public static function toDataPage(Request $request)
    {
        $request->view = new View('data.php', [
            'title' => 'Data',
            'id' => Auth::authenticated(),
        ]);
    }

    public static function upload(Request $request)
    {
        Redirection::redirect('/home');

        $request->post_response = function () use ($request) {

            $tmp_file = $request->parameters['files']['data']['tmp_name'];
            $resources = Config::get('env')['resources'];
            $hash = md5(rand());
            $uncompressed = "$resources/$hash";

            $archive = "$uncompressed.zip";
            move_uploaded_file($tmp_file, $archive);
            $zip = new ZipArchive;
            if ($zip->open($archive) === TRUE) {
                $zip->extractTo($uncompressed);
                $zip->close();
            }
            unlink($archive);

            $json = json_decode(file_get_contents("$uncompressed/plain.json"), true);

            $portion = 100;
            $policies = [];
            $products = [];
            foreach ($json as $row => $value) {
                
                $file = "$uncompressed/{$value['plain_policy']}";
    
                if (is_file($file)) {
                    $policies["{$value['policy_hash']}"] = file_get_contents($file);
                }
                    
                $products[] = [
                    'manufacturer' => $value['manufacturer'],
                    'keyword'      => $value['keyword'],
                    'product_url'  => $value['url'],
                    'website_url'  => $value['website'],
                    'policy_url'   => $value['policy'],
                    'policy_hash'  => $value['policy_hash'],
                ];

                if ($portion-- < 1) {
                    Policy::create($policies);
                    Product::create($products);

                    $portion = 100;
                    $policies = [];
                    $products = [];
                }

            }

            Policy::create($policies);
            Product::create($products);

            static::_rrmdir($uncompressed);

        };

    }

    public static function download(Request $request)
    {
        $resources = Config::get('env')['resources'];
        $hash = md5(rand());
        $file = "$resources/$hash.json";

        file_put_contents($file, json_encode(Selection::packWithUsers()));

        if(file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
        }
    }

}
