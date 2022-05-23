<?php
    require "connect.php";

    // Lấy thông tin thành viên
    function getMembers() {
        global $con;
        // Lệnh truy cập mySQL
        $sql = "SELECT * FROM member ORDER BY id";
        
        $result = $con->query($sql);

        if($result->num_rows > 0) return $result;
        else return "Fail";
    }

    // Xóa thành viên
    function deleteMember($tdn) {
        global $con;
        // Lệnh truy cập mySQL
        $sql = "DELETE FROM member WHERE tendangnhap='$tdn'";

        if($con->query($sql) === TRUE) return "Success";
        else return $con->error;
    }
?>