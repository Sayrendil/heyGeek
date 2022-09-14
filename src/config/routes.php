<?php

return [
    // MainController Для базовых страниц
    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],
    'about' => [
        'controller' => 'main',
        'action' => 'about'
    ],
    'contact' => [
        'controller' => 'main',
        'action' => 'contact'
    ],
    // AccountController Для страниц входа
    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register'
    ],
    'account/confirm/{token:\w+}' => [
        'controller' => 'account',
        'action' => 'confirm'
    ],
    'account/profile' => [
        'controller' => 'account',
        'action' => 'profile'
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout'
    ],
    'account/recovery' => [
        'controller' => 'account',
        'action' => 'recovery'
    ],
    'account/reset/{token:\w+}' => [
        'controller' => 'account',
        'action' => 'reset'
    ],
    // CourseController Для страниц новостей
    'course/courses' => [
        'controller' => 'course',
        'action' => 'courses'
    ],

];