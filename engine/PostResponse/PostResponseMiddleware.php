<?php
namespace Engine\PostResponse;

use Engine\Middleware\Bundled\IMiddleware;
use Engine\Receive\Request;
use Engine\Session\Facade as Session;

/**
 * Router.php
 *
 * Simple router class for managing urls.
 */
class PostResponseMiddleware implements IMiddleware
{
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
        Session::finish_request();

        if (isset($request->post_response)) {
            ($request->post_response)();
        }
        
        return $request;
    }

}
