<?php

$config = [
    \App\Service\CalculService::class => function () { new \App\Service\CalculService(['lol'])},
];

return $config;