<?php

require_once 'app/config.php';

spl_autoload_register(function ($className) use (CLASS_PATHS) {
    foreach (CLASS_PATHS as $path) {
        $classFile = $path . $className . '.php';
        if (file_exists($classFile)) {
            include_once $classFile;
            return true;
        }
    }
    return false;
});

$router = new Router();
$router->init();
