<?php

namespace Framework\Router\Tests;

use Framework\Router\Router;
use Framework\Router\RouterFactory;
use PHPUnit\Framework\TestCase;

class RouterFactoryTest extends TestCase
{
    /* @var RouterFactory $routerFactory */
    private $routerFactory;

    public function setUp()
    {
        $this->routerFactory = new RouterFactory();
    }

    public function testCreate()
    {
        $router = $this->routerFactory->create();

        $this->assertInstanceOf(Router::class, $router);
    }
}