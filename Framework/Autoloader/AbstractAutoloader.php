<?php

require_once('AutoloaderInterface.php');

class AbstractAutoloader implements AutoloaderInterface
{
    public function load($class): bool
    {
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }

    public function register()
    {
        spl_autoload_register('self::load');
    }
}