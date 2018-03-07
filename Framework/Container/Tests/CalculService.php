<?php

namespace Framework\Container\Tests;

class CalculService
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

}