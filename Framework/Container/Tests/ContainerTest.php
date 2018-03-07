<?php

namespace Framework\Container\Tests;

use Framework\Container\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    /* @var Container $container */
    private $container;

    public function setUp()
    {
        $this->container = new Container([]);
    }

    public function testLOL()
    {
        $this->assertTrue(true);
    }
}