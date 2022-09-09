<?php

namespace application\models;
use application\core\Model;

class Account extends Model {

    public function validate($input, $post)
    {

        $rules = [
            'login' => [
                'pattern' => '#^[A-z0-9]{3, 15}$#',
                'message' => 'Логин не должен быть пустой (Должен содержать от 3-15 символов)'
            ],

            'email' => [
                'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
                'message' => 'Email является обязательным полем (Вы должны заполнить по примеру example@example.com)'
            ],

            'password' => [
                'pattern' => '#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,14}$#',
                'message' => 'Пароль является обязательным полем (Разрешены только латинские буквы и цифры от 8 - 14 символов)'
            ],

            'phone' => [
                'pattern' => '#^[0-9]{11, 15}$#',
                'message' => 'Телефон является обязательным полем и должен содержать только цифры'
            ],

            'age' => [
                'pattern' => '#^[0-9]{1}$#',
                'message' => 'Возраст является обязательным полем!'
            ],

        ];

        foreach($input as $val) {
            if(!isset($post[$val]) || !preg_match($rules[$val]['pattern'], $post[$val])) {
                if(empty($post[$val])) {
                    $this->error = $rules[$val]['message'];
                    return false;
                }
            }
        }

        return true;

    }

    // Функции для регистрации пользователей

    public function checkEmail($email) 
    {

        if($this->db->column("SELECT id FROM users WHERE email = '$email'")){
            $this->error = 'Этот Email уже используется';
            return false;
        }
        return true;

    }

    public function checkLogin($login) 
    {

        if($this->db->column("SELECT id FROM users WHERE login = '$login'")){

            $this->error = 'Этот логин уже исспользуется! Выберите другой';
            return false;

        }
        return true;

    }

    public function checkToken($token) 
    {

        return $this->db->column("SELECT id FROM users WHERE token = '$token'");

    }

    public function activate($token) 
    {

        $this->db->query("UPDATE users SET status = 1, token = '' WHERE token = '$token'");

    }

    public function createToken() 
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 8)), 0, 5);
    }

    public function register($post)
    {
        $login = $post['login'];
        $email = $post['email'];
        $gender = $post['gender'];
        $phone = $post['phone'];
        $age = $post['age'];
        $created_at = date("Y-m-d H:i:s");
        $token = $this->createToken();
        $password = password_hash($post['password'], PASSWORD_BCRYPT);
        $status = 0;

        $this->db->query("INSERT INTO `users` VALUES (NULL, '$login', '$age', '$gender', '$phone', '$email', '$password', '$token', '$created_at', '$status');");
    
        mail($email, 'Register', 'Confirm: http://heyGeek/account/confirm/'.$token);

    }

    // Функции для авторизации пользователей

    public function checkData($login, $password)
    {

        $hash = $this->db->column("SELECT password FROM users WHERE login = '$login' AND status = 1");
        if(!$hash or !password_verify($password, $hash)) {
            return false;
        }

        return true;

    }

    public function checkStatus($type, $data) 
    {

        $params = [
            $type => $data
        ];

        $status = $this->db->column("SELECT status FROM users WHERE ". $type ." = '$data'");
        if($status != 1) {
            $this->error = 'Аккаунт ожидает подтверждения по email';
            return false;
        }
        
        return true;
    }

    public function login($login)
    {

        $data = $this->db->row("SELECT * FROM users WHERE login = '$login'");
        $_SESSION['user'] = $data[0];

    }

    public function recovery($email)
    {

        $token = $this->createToken();

        $email = $email['email'];

        $this->db->query("UPDATE users SET token = '$token' WHERE email = '$email';");
    
        mail($email, 'Recovery', 'Recovery Password: http://heyGeek/account/reset/'.$token);

    }

    public function reset($token, $password)
    {

        $password = password_hash($password, PASSWORD_BCRYPT);

        $this->db->query("UPDATE users SET `status` = 1, `token` = '', `password` = '$password' WHERE `token` = '$token'");
    }

}