<?php

namespace application\controllers;
use application\core\Controller;

class AccountController extends Controller {

    public function loginAction() {
        // $this->view->redirect('/');
        $this->view->render('Вход');   
    }

    public function registerAction() {
        if(!empty($_POST)) {

            if(!$this->model->validate(['email', 'password', 'phone', 'age'], $_POST)) {

                $this->view->message('error', $this->model->error);

            } elseif(!$this->model->checkEmail($_POST['email'])) {

                $this->view->message('error', $this->model->error);

            } 
            $this->view->message('success', 'validation ok!');
        }
        // $this->view->layout = 'custom';
        $this->view->render('Регистрация');   
    }

    public function recoveryAction() {
        // $this->view->layout = 'custom';
        $this->view->render('Восстановления пароля');   
    }



}