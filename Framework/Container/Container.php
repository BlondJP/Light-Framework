<?php

namespace Framework\Container;

class Container implements ContainerInterface
{
    private $table;

    public function __construct(array $table)
    {
        $this->table = $table;
    }

    public function get(string $id)
    {
        // TODO: Implement get() method.
    }

    public function has(string $id)
    {
        // TODO: Implement has() method.
    }
}