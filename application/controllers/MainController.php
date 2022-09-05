<?php

namespace application\controllers;
use application\core\Controller;


class MainController extends Controller {

    public function indexAction() {

        $result = $this->model->getNews();
        $vars = [
            'users' => $result,
        ];
        $this->view->render('Главная страница', $vars); 

    }

    public function aboutAction() 
    {

        $this->view->render('Страница О нас');

    }

}

