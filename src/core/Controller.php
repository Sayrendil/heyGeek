<?php

namespace App\core;
use App\core\View;
// require __DIR__ . '\View.php';

abstract class Controller {

    public $route;
    public $view;
    public $acl;

    public function __construct($route)
    {
        $this->route = $route;
        if(!$this->checkAcl()) {
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);

        // debug($this->model);
    }

    public function loadModel($name) 
    {

        $path = 'App\models\\' . ucfirst($name);

        if(class_exists($path)) {
            // debug($path);
            return new $path;
        }

    }

    public function checkAcl() 
    {
        $this->acl = require '../src/acl/' . $this->route['controller'] . '.php';
        // $debug($this->acl);
        if ($this->is_acl('all')) {
            return true;
        }
        elseif (isset($_SESSION['user']['id']) and $this->is_acl('student') and $_SESSION['user']['role'] == 1) {
            return true;
        }
        elseif (isset($_SESSION['user']['id']) and $this->is_acl('teacher') and $_SESSION['user']['role'] == 2) {
            return true;
        }
        elseif (isset($_SESSION['admin']) and $this->is_acl('admin') and $_SESSION['user']['role'] == 3) {
            return true;
        }

        return false;

    }

    public function is_acl($key) 
    {   
        return in_array($this->route['action'], $this->acl[$key]);
    }

}