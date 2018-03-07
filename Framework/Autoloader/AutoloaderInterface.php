<?php

interface AutoloaderInterface
{
    public function register();
    public function load($class) : bool;
}