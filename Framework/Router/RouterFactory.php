<?php

namespace Framework\Router;

class RouterFactory
{
    use RoutesTrait;

    public function create() : Router
    {
        return new Router($this->routes);
    }
}