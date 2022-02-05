<?php

namespace Engine\Services;

use Engine\Service;

/**
 * DownloadService.php
 *
 * Service for downloads management.
 */
class DownloadService extends Service
{

    /**
     * Alias for service.
     *
     * @var string
     */
    static public string $alias = 'download';

    /**
     * Gives file to download.
     *
     * @access protected
     * @param string $file - Path of file
     * @param string $remove - Remove after download
     * @return void
     */
    protected function do(string $file, bool $remove = false): void
    {
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
            if ($remove) unlink($file);
        }
    }

}
