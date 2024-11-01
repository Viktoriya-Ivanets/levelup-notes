<?php

require_once 'app/config.php';

$classPaths = CLASS_PATHS; // Створюємо змінну з константи

spl_autoload_register(function ($className) use ($classPaths) {
    foreach ($classPaths as $path) {
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
