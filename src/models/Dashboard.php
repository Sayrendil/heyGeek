<?php

namespace App\models;
use App\core\Model;

class Dashboard extends Model {

    public function getActiveCourse() {
        $user_id = $_SESSION['user']['id'];
        $course = $this->db->row("SELECT * FROM active_courses
        JOIN courses ON active_courses.course_id = courses.id
        JOIN users ON active_courses.user_id = users.id
        WHERE user_id ='$user_id'");

        return $course;
    }

}