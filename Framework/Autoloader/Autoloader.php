<?php

class Autoloader
{
    public function register()
    {
        spl_autoload_register([__CLASS__, 'load']);
    }

    public function load($className)
    {
        $folders = $this->provideFolders();

        foreach ($folders as $folder) {
            $filePath = $folder.'/'.$className.'.php';
            if (file_exists($filePath)) {

                require $filePath;

                return true;
            }
        }

        return false;
    }

    private function provideFolders()
    {
        // L'ordre determine le dossier prioritaire de chargement
        yield 'Framework';
        yield 'App';
    }

}