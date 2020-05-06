<?php

namespace Engine;

use Engine\Decorators\FSMap;

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
     * @access private
     * @var string
     */
    private $path;

    /**
     * Variables for template.
     *
     * @access private
     * @var string
     */
    private $variables;

    /**
     * View constructor.
     *
     * @access public
     * @param string $path Path of template file
     * @param array $variables Variables to paste in template
     */
    public function __construct($path, array $variables)
    {
        $this->path = FSMap::get('templates') . '/' . $path;
        $this->variables = $variables;
    }

    /**
     * Render template.
     *
     * @access public
     */
    public function display(): void
    {
        ob_start();
        extract($this->variables);
        require_once($this->path);
        ob_end_flush();
    }

}
