<?php

namespace application\core;
use application\core\View;

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

        $path = 'application\models\\' . ucfirst($name);

        if(class_exists($path)) {
            return new $path;
        }

    }

    public function checkAcl() 
    {
        $this->acl = require 'application/acl/' . $this->route['controller'] . '.php';
        if ($this->is_acl('all')) {
            return true;
        }
        elseif (isset($_SESSION['user']['id']) and $this->is_acl('student')) {
            return true;
        }
        elseif (!isset($_SESSION['user']['id']) and $this->is_acl('teacher')) {
            return true;
        }
        elseif (isset($_SESSION['admin']) and $this->is_acl('admin')) {
            return true;
        }

        return false;

    }

    public function is_acl($key) 
    {   
        return in_array($this->route['action'], $this->acl[$key]);
    }

}