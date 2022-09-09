<?php

// Подключение файла дебага для удобного развертывания переменныз
// namespace application\core;
require '../application/lib/Dev.php';
require '../application/core/Router/Router.php';

// используем use для подключения класса

// use public\application\core\Router;

// Подключаем автозагрузку классов для удобного подключения файлов

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if(file_exists($path)) {
        require $path;
    }
});

session_start();

// Объявление нового класса

$router = new Router;
$router->run();
// debug($_SESSION['user']);
// debug($router->run());