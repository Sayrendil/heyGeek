<?php

namespace application\controllers;
use application\core\Controller;

class CourseController extends Controller {

    public function coursesAction() {
        // $this->view->redirect('/');
        $this->view->render('Курсы');   
    }

}