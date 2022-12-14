<?php

namespace App\lib;
use PDO, PDOException;

class Db {

    protected $db;

    public function __construct()
    {
        
        $config = require '../src/config/db.php';
        // $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'], $config['user'], $config['password']);

        try {
            $this->db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

    public function query($sql) 
    {
        $query = $this->db->query($sql);
        return $query;
    }

    public function row($sql)
    {
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql)
    {
        $result = $this->query($sql);
        return $result->fetchColumn();
    }

}