<?php

abstract class AbstractController
{
    private $container;

    public function __construct(\Framework\Container\ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function displayHtmlTemplate(string $template)
    {
        if (!file_exists($template)) {
            throw new Exception('template ' . $template . ' not found', 404);
        }

        return require_once($template);
    }

    public function renderInJson($data)
    {
        $json = json_encode($data);
        echo $json;
    }

    public function get(string $id)
    {
        return $this->container->get($id);
    }
}