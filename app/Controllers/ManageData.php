<?php

namespace App\Controllers;

use App\Models\Selection;
use App\Models\Policy;
use App\Models\Product;
use Engine\Config;
use Engine\Services\AuthService as Auth;
use Engine\Services\FileSystemService as FS;
use Engine\Request;
use Engine\View;
use Engine\Services\RedirectionService as Redirection;

/**
 * ManageData.php
 *
 * Controller class for loading annotation page.
 */
class ManageData
{

    /**
     * Goes to annotation page.
     *
     * @param Request $request
     */
    public static function toDataPage(Request $request)
    {
        $request->view = new View('data.php', [
            'title' => 'Data',
            'id' => Auth::authenticated(),
        ]);
    }

    /**
     * Uploads data for annotation.
     *
     * @param Request $request
     */
    public static function upload(Request $request)
    {
        Redirection::redirect('/home');

        $request->post_response = function () use ($request) {

            $tmp_file = $request->parameters['files']['data']['tmp_name'];
            $hash = md5(md5(rand()));

            $archive = "$hash.zip";
            FS::resource($tmp_file, $archive);
            FS::unzip($archive, $hash);

            $json = json_decode(FS::read("$hash/plain.json"), true);

            $policies = [];
            foreach ($json as $row => $value) {
                $content = FS::read("$hash/{$value['plain_policy']}");
                $policies[$value['policy_hash']] = str_replace("\r", '', $content);
            }
            Policy::create($policies);

            $portion = 100;
            $products = [];
            foreach ($json as $row => $value) {
                
                if (!in_array($value['policy_hash'], array_keys($policies))) continue;

                $products[] = [
                    'manufacturer' => $value['manufacturer'],
                    'keyword'      => $value['keyword'],
                    'product_url'  => $value['url'],
                    'website_url'  => $value['website'],
                    'policy_url'   => $value['policy'],
                    'policy_hash'  => $value['policy_hash']
                ];

                if ($portion-- < 1) {
                    Product::create($products);
                    $portion = 100;
                    $products = [];
                }

            }

            Product::create($products);
            FS::rmdir($hash, true);
        };

    }

    /**
     * Gives annotation data for download.
     *
     * @param Request $request
     */
    public static function download(Request $request)
    {
        $hash = md5(rand());
        $file = "$hash.json";
        FS::write($file, json_encode(Selection::packWithUsers()));
        FS::download($file, true);
    }

}
