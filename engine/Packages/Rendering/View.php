<?php

namespace Engine\Packages\Rendering;

use Engine\Config;
use Engine\Packages\Debug\Facade as Debug;

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
    private string $_path;

    /**
     * Variables for template.
     *
     * @access private
     * @var array
     */
    private array $_variables;

    /**
     * View constructor.
     *
     * @access public
     * @param string $path Path of template file
     * @param array $variables Variables to paste in template
     */
    public function __construct($path, array $variables)
    {
        $env = Config::get('env');
        $this->_path = $env['views'] . "/$path";
        $this->_variables = $variables;
    }

    /**
     * View constructor.
     *
     * @access public
     * @param string $path Path of template file
     * @param array $variables Variables to paste in template
     */
    public function push(string $name, $value)
    {
        $this->_variables[$name] = $value;
    }

    /**
     * Render template.
     *
     * @access public
     */
    public function display(): void
    {
        ob_start();
        Debug::printIfAllowed();
        extract($this->_variables);
        require_once($this->_path);
        ob_end_flush();
    }

}
