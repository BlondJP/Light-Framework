<?php

interface AutoloaderInterface
{
    public function register() : void;
    public function load($class) : bool;
}