<?php
    require "connect.php";

    // Lấy dữ liệu đơn hàng
    function getCart() {
        global $con;
        // Lệnh truy cập vào mySQL
        $sql = "SELECT * FROM bill";

        $result = $con->query($sql);
        if($result->num_rows > 0) return $result;
        return "Fail";
    }

    // Hủy đơn hàng
    function deleteCart($id) {
        global $con;
        // Lệnh truy cập vào mySQL
        $sql = "DELETE FROM bill WHERE id='$id'";

        if($con->query($sql) === TRUE) return "Success";
        return $con->error;
    }

    // Cập nhật trạng thái đơn hàng
    function updateCart($id, $state) {
        global $con;
        // Lệnh truy cập vào mySQL
        $sql = "UPDATE bill SET trangthai='$state' WHERE id='$id'";

        if($con->query($sql) === TRUE) return "Success";
        return $con->error;
    }
?>