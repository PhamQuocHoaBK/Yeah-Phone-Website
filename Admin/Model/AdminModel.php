<?php
    require "connect.php";

    // Xu ly dang nhap cho Admin
    function login($u, $p) {
        global $con;
        // Lệnh truy cập mySQL
        $sql = "SELECT user, pass FROM admin WHERE user='$u' AND pass='$p' ";

        $result = $con->query($sql);

        if($result->num_rows > 0) {
            return "OK";
        }
        else return "ERROR";
    }

    // Lay thong tin admin
    function getInfo($user) {
        global $con;
        // Lệnh truy cập mySQL
        $sql = "SELECT * FROM admin WHERE user='$user'";

        $result = $con->query($sql);

        if($result->num_rows > 0) return $result;
        else return "Fail";
    }

?>