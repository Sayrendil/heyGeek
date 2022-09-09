<?php

namespace App;
use App\Book\Book;

// Подключение файла дебага для удобного развертывания переменныз
// namespace application\core;
require_once '../vendor/autoload.php';

require_once '../src/lib/Dev.php';
require '../src/core/Router/Router.php';

// используем use для подключения класса

$book = new Book();

echo $book->path();

// Подключаем автозагрузку классов для удобного подключения файлов

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if(file_exists($path)) {
        require $path;
    }
});

session_start();

// Объявление нового класса

$router = new \Router;
$router->run();
// debug($_SESSION['user']);
// debug($router->run());