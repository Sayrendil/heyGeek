<?php

// Подключение файла дебага для удобного развертывания переменныз
// namespace application\core;
require dirname(__DIR__) . '/vendor/autoload.php';

require_once '../src/lib/Dev.php';
// require '../src/core/Router/Router.php';

use App\core\Router;

// Подключаем автозагрузку классов для удобного подключения файлов

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
    // debug($path);
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