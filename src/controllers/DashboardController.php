<?php

namespace App\controllers;
use App\core\Controller;


class DashboardController extends Controller {

    public function courseAction() {
        
        $vars = $this->model->getActiveCourse();

        debug($vars);

        $this->view->render('Действующие курсы', $vars);

    }

    public function lessonsAction() 
    {

        $this->view->render('Уроки');

    }

}

