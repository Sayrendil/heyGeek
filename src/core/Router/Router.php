<?php

// namespace application\core\Router;
// use application\core\View;
require '../src/core/View/View.php';

class Router {

    protected $routes = [];
    protected $params = [];

    // Магический метод конструктор запускается автоматически после загрузки класса

    function __construct()
    {
        
        $arr = require '../src/config/routes.php';
        // debug($arr);
        foreach($arr as $key => $value) {
            // debug($value);
            $this->add($key, $value);
        }

    }

    public function add($route, $params) 
    {
        
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;

    }

    public function match() 
    {
        
        $url = trim($_SERVER['REQUEST_URI'], '/');
        // debug($url);

        foreach($this->routes as $route => $params) {
            // debug($params);
            if(preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                // debug($this->params);
                return true;
            }
        }

        return false;

    }

    public function run() 
    {
        if($this->match() == true) {
            // $dir = substr(__DIR__, );
            $path = '../src/controllers/' . ucfirst($this->params['controller']) .'Controller.php';
            // debug($path);
            if(file_exists($path)) {
                $action = $this->params['action'] . 'Action';
                $class_methods = '\src\controllers\\' . ucfirst($this->params['controller']) .'Controller';
                if(method_exists($class_methods, $action)) {
                    $controller = new $path($this->params);
                    // debug($controller);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else{
            View::errorCode(404);
        }
        // echo 'Start';
    }

}