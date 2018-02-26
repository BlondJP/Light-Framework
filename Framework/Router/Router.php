<?php

namespace Framework\Router;

class Router
{
    public function process()
    {
        $route = $this->getRoute();
    }

    private function getRoute()
    {
        $url = $_SERVER["REQUEST_URI"];
        die($url);
    }
}