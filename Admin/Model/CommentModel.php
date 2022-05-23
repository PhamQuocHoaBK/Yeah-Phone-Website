<?php
    require "connect.php";

    // Lấy thông tin bình luận
    function getComment() {
        global $con;
        // Lệnh truy cập vào mySQL
        $sql = "SELECT * FROM comment";

        $result = $con->query($sql);

        if($result->num_rows > 0) return $result;
        else return "Fail";
    }

    // Xóa bình luận
    function deleteComment($id) {
        global $con;
        // Lệnh truy cập vào mySQL
        $sql = "DELETE FROM comment WHERE id='$id'";

        if($con->query($sql) === TRUE) return "Success";
        return $con->error;
    }
?>