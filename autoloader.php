<?php 

spl_autoload_register('autoloadDTO');
spl_autoload_register('autoloadEntity');
spl_autoload_register('autoloadORM');
spl_autoload_register('autoloadService');

function autoloadDTO($className){
    $path = __DIR__ . '/src/';
    $extension = '.php';
    $classnamePath = str_replace('\\','/',$className);
    $fullPath = $path . $classnamePath . $extension;
    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
}

function autoloadEntity($className){
    $path = __DIR__ . '/src/';
    $extension = '.php';
    $classnamePath = str_replace('\\','/',$className);
    $fullPath = $path . $classnamePath . $extension;
    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
}

function autoloadORM($className){
    $path = __DIR__ . '/src/';
    $extension = '.php';
    $classnamePath = str_replace('\\','/',$className);
    $fullPath = $path . $classnamePath . $extension;
    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
}

function autoloadService($className){
    $path = __DIR__ . '/src/';
    $extension = '.php';
    $classnamePath = str_replace('\\','/',$className);
    $fullPath = $path . $classnamePath . $extension;
    if (file_exists($fullPath)) {
        echo 'inside loop--- may be its working';
        require_once $fullPath;
    }
}

?>