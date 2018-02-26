<?php

require_once('Framework/Autoloader/Autoloader.php');

$autoloader = new Autoloader();
$autoloader->register();

use Framework\Test;

$l = new Test();

$t = new \App\Test();

var_dump($l, $t);

$router = new \Framework\Router\Router();
$router->process();