<?php

namespace application\controllers;
use application\core\Controller;
use application\lib\Db;

class MainController extends Controller {

    public function indexAction() {

        $db = new Db;

        $form = 2;

        $data = $db->row("SELECT first_name FROM users");
        debug($data);

        $this->view->render('Главная страница'); 

    }

}