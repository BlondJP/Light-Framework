<?php

namespace Framework\Container;

class Container implements ContainerInterface
{
    /**
     * List of possible callable class id
     *
     * @var array
     */
    private $table;

    /**
     * List of the instances
     *
     * @var array
     */
    private $instances;

    public function __construct(array $table)
    {
        $this->table = $table;
        $this->instances = [];
    }

    public function get(string $id)
    {
        var_dump($this->table); die;

        if ($this->has($id) === true) {
            $construction = $this->table[$id];
            var_dump($construction); die;
        }

        return null;
    }

    public function has(string $id)
    {
        return array_key_exists($id, $this->table);
    }
}