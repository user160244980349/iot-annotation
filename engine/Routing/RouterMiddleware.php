<?php
namespace Engine\Routing;

use Engine\Middleware\Bundled\IMiddleware;
use Engine\Receive\Request;
use Engine\Config;
use Error;

/**
 * Router.php
 *
 * Simple router class for managing urls.
 */
class RouterMiddleware implements IMiddleware
{
    /**
     * Map for urls and controllers.
     *
     * @access private
     * @var array
     */
    private array $_routes;

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    public function __construct()
    {
        $this->_routes = Config::get('routes');
    }

    /**
     * Method providing middlewares chain call.
     *
     * @access public
     * @param Request $request
     * @return Request
     * @throws Error
     */
    public function let(?Request $request): Request
    {

        foreach ($this->_routes as $route) {
            if ($route->test($request->parameters['uri'],
                             $request->parameters['method'])) {
                
                $request->route = $route;
                return $request;
            }
        }
        
        throw new Error('The requested route does not exist!', 404);
    }

}
