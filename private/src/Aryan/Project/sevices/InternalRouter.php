<?php
declare(strict_types=1);

namespace Aryan\Project\sevices;

use Teacher\GivenCode\Abstracts\IService;
use Teacher\GivenCode\Domain\AbstractRoute;
use Teacher\GivenCode\Domain\APIRoute;
use Teacher\GivenCode\Domain\CallableRoute;
use Teacher\GivenCode\Domain\RouteCollection;
use Teacher\GivenCode\Domain\WebpageRoute;
use Teacher\GivenCode\Exceptions\RequestException;
use Teacher\GivenCode\Exceptions\ValidationException;

/**
 *
 */
class InternalRouter implements IService {
    
    private string $uriBaseDirectory;
    private RouteCollection $routes;
    
    /**
     * @param string $uri_base_directory
     * @throws ValidationException
     */
    public function __construct(string $uri_base_directory = "") {
        $this->uriBaseDirectory = $uri_base_directory;
        $this->routes = new RouteCollection();
        $this->routes->addRoute(new WebpageRoute("/index.php", "aryan/index.php"));
        $this->routes->addRoute(new WebpageRoute("/", "Teacher/Examples/example_page.php"));
    }
    
    /**
     * @return void
     * @throws RequestException
     */
    public function route() : void {
        $path = REQUEST_PATH;
        $route = $this->routes->match($path);
        
        if (is_null($route)) {
            // route not found
            throw new RequestException("Route [$path] not found.", 404);
        }
        
        $route->route();
        
    }
    
    /**
     * @param AbstractRoute $route
     * @return void
     * @throws ValidationException
     */
    public function addRoute(AbstractRoute $route) : void {
        $this->routes->addRoute($route);
    }
}