<?php

namespace App\models;
use App\core\Model;

class Course extends Model {

    public function getCourses() {
        // $result = $this->db->row("SELECT * FROM courses");
        return $this->db->row("SELECT * FROM courses");
    }

    public function createToken() 
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 8)), 0, 5);
    }

    public function checkToken($token) 
    {

        return $this->db->column("SELECT id FROM active_course WHERE token = '$token'");

    }

    public function activate($token) 
    {

        $this->db->query("UPDATE active_course SET status = 1, token = '' WHERE token = '$token'");

    }

    public function sendcourse($post) {

        $course_id = $post['course_id'];
        $user_id = $_SESSION['user']['id'];
        $created_at = date("Y-m-d H:i:s");
        $token = $this->createToken();
        $status_learn = 0;
        $status = 0;

        $this->db->query("INSERT INTO `active_course` VALUES (NULL, '$course_id', '$user_id', '$status', '$status_learn', '$token', '$created_at');");
    
        mail($_SESSION['user']['email'], 'Запись на курс на сайте heyGeek.kz', 'Подтвердите запись: http://heyGeek/course/confirm/'.$token);

    }

}