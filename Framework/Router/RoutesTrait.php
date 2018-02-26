<?php

namespace Framework\Router;

trait RoutesTrait
{
    /**
     * 'route' => 'controller/action'
     *
     * @var array $routes
     */
    private $routes;

    public function __construct()
    {
        $this->routes = [
            '/test/route/lol' => '/post/index'
        ];
    }
}