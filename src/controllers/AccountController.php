<?php

namespace App\controllers;
use App\core\Controller;

class AccountController extends Controller {

    public function registerAction() {
        // debug($this->model->createToken());
        if(!empty($_POST)) {

            if(!$this->model->validate(['login', 'email', 'password', 'phone', 'age'], $_POST)) {

                $this->view->message('error', $this->model->error);

            } elseif(!$this->model->checkEmail($_POST['email'])) {

                $this->view->message('error', $this->model->error);

            } elseif(!$this->model->checkLogin($_POST['login'])) {

                $this->view->message('error', $this->model->error);

            } 
            $this->model->register($_POST);
            $this->view->message('success', 'Регистрация заверешена подтвердите свой email!');
        }
        // $this->view->layout = 'custom';
        $this->view->render('Регистрация');   
        
    }

    public function confirmAction() {
        // $this->view->layout = 'custom';
        
        if(!$this->model->checkToken($this->route['token'])) {
            $this->view->redirect('account/login');
        }
        $this->model->activate($this->route['token']);
        $this->view->render('Регистрация завершена');   
        
    }

    // Авторизация

    public function loginAction() {
        // debug($this->model->createToken());
        if(!empty($_POST)) {

            if(!$this->model->validate(['login', 'password'], $_POST)) {

                $this->view->message('error', $this->model->error);

            } elseif(!$this->model->checkStatus('login', $_POST['login'])) {

                $this->view->message('error', $this->model->error);

            } elseif(!$this->model->checkData($_POST['login'], $_POST['password'])) {

                $this->view->message('error', 'Логин или пароль указан не верно!');

            }
            $this->model->login($_POST['login']);
            $this->view->location('/account/profile');
        }
        // $this->view->layout = 'custom';
        $this->view->render('Вход');  
    }

    // Профиль Пользователя

    public function profileAction()
    {

        $this->view->render('Профиль');

    }

    public function logoutAction()
    {

        unset($_SESSION['user']);
        $this->view->redirect('account/login');

    }

    // Восстановление пароля

    public function recoveryAction() {
        // debug($this->model->createToken());
        if(!empty($_POST)) {

            if(!$this->model->validate(['email'], $_POST)) {

                $this->view->message('error', $this->model->error);

            } elseif($this->model->checkEmail($_POST['email'])) {

                $this->view->message('error', 'Пользователь не найден');

            } elseif(!$this->model->checkStatus('email', $_POST['email'])) {

                $this->view->message('error', $this->model->error);

            }
            $this->model->recovery($_POST);
            $this->view->message('success', 'Запрос на восстановление пароля отправлен на email!');
        }
        // $this->view->layout = 'custom';
        $this->view->render('Восстановление пароля');   
    }

    public function resetAction() {
        // $this->view->layout = 'custom';
        
        if(!$this->model->checkToken($this->route['token'])) {
            $this->view->redirect('account/recovery');
        }
        $this->model->reset($this->route['token']);
        $this->view->render('Пароль успешно сброшен!');   
        
    }

}