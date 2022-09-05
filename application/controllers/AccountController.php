<?php

namespace application\controllers;
use application\core\Controller;

class AccountController extends Controller {

    public function loginAction() {
        if(!empty($_POST)) {
            $this->view->message('success', '123');
        }
        // $this->view->redirect('/');
        $this->view->render('Вход');   
    }

    public function registerAction() {
        // $this->view->layout = 'custom';
        $this->view->render('Регистрация');   
    }

    public function recoveryAction() {
        // $this->view->layout = 'custom';
        $this->view->render('Восстановления пароля');   
    }

}