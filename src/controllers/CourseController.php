<?php

namespace src\controllers;
use src\core\Controller;

class CourseController extends Controller {

    public function coursesAction() {
        // $this->view->redirect('/');
        $this->view->render('Курсы');   
    }

}