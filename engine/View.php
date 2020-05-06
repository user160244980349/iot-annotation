<?php

namespace Engine;

/**
 * View.php
 *
 * Class View - template manager, that collects variables and injects those in templates.
 */
class View
{

    /**
     * Path of template.
     *
     * @var string.
     * @access private.
     */
    private $path;

    /**
     * Variables for template.
     *
     * @access private.
     * @var string.
     */
    private $variables;

    /**
     * View constructor.
     *
     * @param string $path Path of template file.
     * @param array $variables Variables to paste in template.
     * @access public.
     */
    public function __construct($path, array $variables)
    {
        $this->path = ServiceBus::get('fs_map')->get('templates') . '/' . $path;
        $this->variables = $variables;
    }

    /**
     * Render template.
     *
     * @access public.
     */
    public function display()
    {
        ob_start();
        extract($this->variables);
        require $this->path;
        ob_end_flush();
    }

}
