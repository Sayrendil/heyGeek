<?php

namespace App\models;
use App\core\Model;

class Main extends Model {

    public function getNews() {
        $result = $this->db->row("SELECT * FROM users");
        return $result;
    }

}