<?php
include_once "m_koneksi.php";

class m_login {

    public function getUserByUsername($username){
        $conn = new m_koneksi();

        $stmt = $conn->koneksi->prepare(
            "SELECT * FROM user WHERE username=?"
        );

        $stmt->bind_param("s",$username);
        $stmt->execute();

        return $stmt->get_result();
    }
}
