<?php

namespace Framework\Container\Tests;

use Framework\Container\Container;
use PHPUnit\Framework\TestCase;

/**
 * @group ContainerTest
 *
 * Class ContainerTest
 * @package Framework\Container\Tests
 */
class ContainerTest extends TestCase
{
    /* @var Container $container */
    private $container;

    public function setUp()
    {
        $config = [
            CalculService::class => function () { return new CalculService(['lol']); }
        ];

        $this->container = new Container($config);
    }

    public function testHas()
    {
        $res = $this->container->has(CalculService::class);
        $this->assertTrue($res);

        $res = $this->container->has('fake');
        $this->assertFalse($res);
    }

    /**
     * @group ContainerTesttestGet
     */
    public function testGet()
    {
        $this->container->get(CalculService::class);
    }
}