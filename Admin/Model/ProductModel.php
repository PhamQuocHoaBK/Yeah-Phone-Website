<?php
require "connect.php";

// Lấy thông tin sản phẩm
function getProducts() {
    global $con;
    // Lệnh truy cập mySQL
    $sql = "SELECT * FROM product ORDER BY id";
    
    $result = $con->query($sql);

    if($result->num_rows > 0) return $result;
    else return "Fail";
}

// Xóa thông tin sản phẩm
function deleteProduct($v) {
    global $con;
    //Lệnh truy cập mySQL
    $sql = "DELETE FROM product where msp='$v'";

    if($con->query($sql) === TRUE ) return 0;
    return $con->error;
}

// Cập nhật thông thông tin sản phẩm
function updateProduct($id, $msp, $tensp, $gia) {
    global $con;
    //Lệnh truy cập mySQL
    $sql = "UPDATE product SET msp='$msp', tensp='$tensp', gia='$gia' WHERE id=$id";

    if($con->query($sql) === TRUE) return "Success";
    else return $con->error;
}

?>