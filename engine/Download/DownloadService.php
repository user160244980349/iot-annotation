<?php

namespace Engine\Download;

/**
 * Session.php
 *
 * Service for sessions  management.
 */
class DownloadService
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public string $alias = 'download';

    /**
     * Gives session variable.
     *
     * @access public
     * @param string $name - Name of a variable
     * @return mixed
     */
    public function do(string $file, bool $remove)
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
