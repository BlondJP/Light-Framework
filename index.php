<?php

require_once('Framework/Autoloader/Autoloader.php');

$autoloader = new Autoloader();
$autoloader->register();

$router = new \Framework\Router\Router([
    '/test/route/lol' => '/post/index'
]);
$router->process();