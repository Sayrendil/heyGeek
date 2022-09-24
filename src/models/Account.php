<?php

namespace App\models;
use App\core\Model;
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

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
                'pattern' => '#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8, }$#',
                'message' => 'Пароль является обязательным полем (Разрешены только латинские буквы и цифры от 3 - 14 символов)'
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

        return $this->db->column("SELECT id FROM users WHERE email = '$email'");

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
        $role = 1;

        $this->db->query("INSERT INTO `users` VALUES (NULL, '$login', '$age', '$gender', '$phone', '$email', '$password', '$token', '$created_at', '$status', '$role');");
        
        $mail = new \App\PHPMailer();

        try {
            $mail->isSMTP();   
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth   = true;
            //$mail->SMTPDebug = 2;
            $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

            // Настройки вашей почты
            $mail->Host       = 'smtp.google.com'; // SMTP сервера вашей почты
            $mail->Username   = 'daniyarsigaev@gmail.com'; // Логин на почте
            $mail->Password   = 'GTS3850!@#'; // Пароль на почте
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            $mail->setFrom('mail@heyGeek.kz', 'HeyGeek'); // Адрес самой почты и имя отправителя

            // Получатель письма
            $mail->addAddress($email);  
            $mail->addAddress('daniyarsigaev@gmail.com'); // Ещё один, если нужен

            // Прикрипление файлов к письму
        if (!empty($file['name'][0])) {
            for ($ct = 0; $ct < count($file['tmp_name']); $ct++) {
                $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
                $filename = $file['name'][$ct];
                if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)) {
                    $mail->addAttachment($uploadfile, $filename);
                    $rfile[] = "Файл $filename прикреплён";
                } else {
                    $rfile[] = "Не удалось прикрепить файл $filename";
                }
            }   
        }
        // Отправка сообщения
        $mail->isHTML(true); 
        $mail->title = 'Регистрация на сайте heyGeek.kz';
        $mail->Subject = 'Register';
        $mail->body    = 'Confirm: http://heyGeek/account/confirm/<b>'.$token . '</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 

        // Проверяем отравленность сообщения
        if ($mail->send()) {$result = "success";} 
        else {$result = "error";}

        } catch (Exception $e) {
            $result = "error";
            $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
        }

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