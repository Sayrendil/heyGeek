<?php

namespace App\models;
use App\core\Model;

class Dashboard extends Model {

    public function getActiveCourse() {
        $user_id = $_SESSION['user']['id'];
        return $this->db->row("SELECT * FROM active_course WHERE user_id ='$user_id'");
    }

}