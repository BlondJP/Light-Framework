<?php

require_once('Framework/Autoloader/Autoloader.php');

$autoloader = new Autoloader();
$autoloader->register();

$factory = new \Framework\Router\RouterFactory();
$router = $factory->create();

$action = $router->getAction();

echo $action;