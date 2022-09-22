<?php

namespace App\controllers;
use App\core\Controller;

class CourseController extends Controller {

    public function coursesAction() {
        
        if (!empty($_POST)) {
            // debug($_POST['password']);
            if(!isset($_SESSION['user']['id'])) {
                $this->view->message('error', 'Вы не вошли');
            }
			$this->model->sendcourse($_POST);
			$this->view->message('success', 'Регистрация завершена, подтвердите свой E-mail');
		}

        $vars = $this->model->getCourses();
        $this->view->render('Курсы', $vars);

    }

    public function confirmAction() {
        // $this->view->layout = 'custom';
        
        if(!$this->model->checkToken($this->route['token'])) {
            $this->view->redirect('course/courses');
        }
        $this->model->activate($this->route['token']);
        $this->view->render('Запись на курс звершена');   
        
    }

}