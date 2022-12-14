<?php

namespace App\core;

class View {

    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
    
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
        // debug($this->path);
    
    }

    public function render($title, $vars = []) 
    {   

        // extract($vars);
        $path = dirname(__DIR__) . '/views/' . $this->path . '.php';
        // debug($path);
        if(file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require dirname(__DIR__) . '/views/layouts/' . $this->layout . '.php';
        } else {
            echo "Вид не найден: " . $this->path;
        }

    }

    public function redirect($url) 
    {

        header("Location: /" . $url);
        exit;

    }

    public static function errorCode($code) 
    {
        
        http_response_code($code);
        $path = dirname(__DIR__) . '/views/errors/' . $code . '.php';
        if(file_exists($path)) {
            require $path;
        }
        exit;
    
    }

    public function message($status, $message) 
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url) 
    {
        exit(json_encode(['url' => $url]));
    }

}