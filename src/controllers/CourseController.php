<?php

namespace App\controllers;
use App\core\Controller;

class CourseController extends Controller {

    public function coursesAction() {
        // $this->view->redirect('/');
        $this->view->render('Курсы');   
    }

}