<?php

$config = [
    \App\Service\CalculService::class => function () { return new \App\Service\CalculService(['lol'])},
];

return $config;