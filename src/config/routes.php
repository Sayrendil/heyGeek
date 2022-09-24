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
    // DashboardController для страницы учебной панели
    'dashboard/course' => [
        'controller' => 'dashboard',
        'action' => 'course'
    ],
    'dashboard/lessons' => [
        'controller' => 'dashboard',
        'action' => 'lessons'
    ],
    'dashboard/grades' => [
        'controller' => 'dashboard',
        'action' => 'grades'
    ],
    'dashboard/course_teach' => [
        'controller' => 'dashboard',
        'action' => 'course_teach'
    ],
    'dashboard/lessons_teach' => [
        'controller' => 'dashboard',
        'action' => 'lessons_teach'
    ],
    'dashboard/users_teach' => [
        'controller' => 'dashboard',
        'action' => 'users_teach'
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
    'course/confirm/{token:\w+}' => [
        'controller' => 'course',
        'action' => 'confirm'
    ],

];