<?php

class UserModel {

    private $db;

    public function __construct($koneksi){
        $this->db = $koneksi;
    }

    public function login($username,$password){
        $q = $this->db->query("
            SELECT * FROM user
            WHERE username='$username'
            AND password='$password'
        ");

        return $q->fetch_assoc();
    }
}
