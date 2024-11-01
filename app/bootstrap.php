<?php

require_once 'app/config.php';

spl_autoload_register(function ($className) {
    $classFile = CLASSES_PATH . $className . '.php';
    if (file_exists($classFile)) {
        include_once $classFile;
        return true;
    }

    $coreFile = CORE_PATH . $className . '.php';
    if (file_exists($coreFile)) {
        include_once $coreFile;
        return true;
    }
    return false;
});

$router = new Router();
$router->init();