<?php

namespace application\models;
use application\core\Model;

class Account extends Model {

    public function validate($input, $post)
    {

        $rules = [
            'email' => [
                'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
                'message' => 'Email ардес указан не верно'
            ],

            'password' => [
                'pattern' => '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,14}$',
                'message' => 'Пароль указан не верно (Разрешены только латинские буквы и цифры от 8 - 14 символов)'
            ],

            'phone' => [
                'pattern' => '#^[0-9]{11, 15}$#',
                'message' => 'Телефон должен содержать только цифры'
            ],

            'age' => [
                'pattern' => '#^[0-9]{1}$#',
                'message' => 'Вы не указали возраст!'
            ],

        ];

        foreach($input as $val) {
            if(!isset($post[$val]) OR !preg_match($rules[$val]['pattern'], $post[$val])) {
                if(empty($post[$val])) {
                    $this->error = $rules[$val]['message'];
                    return false;
                }
            }
        }

        return true;

    }

    public function checkEmail($email) 
    {

        $params = [
            'email' => $email,
        ];

        if($this->db->column("SELECT id FROM users WHERE email = :email", $params)){
            $this->error = 'Этот Email уже используется';
            return false;
        }
        return true;

    }

    public function checkPhone($phone) 
    {
        
        $params = [
            'phone' => $phone,
        ];

        if($this->db->column("SELECT id FROM users WHERE phone = :phone", $params)){

            $this->error = 'Этот телефон уже исспользуется!';
            return false;

        }
        return true;

    }

}