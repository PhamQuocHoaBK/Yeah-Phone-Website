<?php
require "../Model/base.php";

// Xử lý đăng nhập
if (isset($_POST['login_admin'])) {
    session_start();

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $result = login($user, $pass);

    if ($result == "OK") {
        $_SESSION['username'] = $user;
    } else echo "Not found account";
}

// Xử lý đăng xuất
if(isset($_GET['logout_admin'])) {
    session_start();
    if(isset($_SESSION['username'])) {
        unset($_SESSION['username']);
    }
    echo "OK";
}

// Xử lý xóa thành viên
if (isset($_GET['remove_member'])) {
    echo deleteMember($_GET['remove_member']);
}

// Xử lý xóa sản phẩm
if (isset($_GET['remove_product'])) {
    echo deleteProduct($_GET['remove_product']);
}

// Xử lý cập nhật sản phẩm
if (isset($_GET['update_product'])) {
    echo updateProduct($_GET['idsp'], $_GET['masp'], $_GET['tensp'], $_GET['giaca']);
}

// Xử lý xóa bình luận
if (isset($_GET['remove_comment'])) {
    echo deleteComment($_GET['remove_comment']);
}

// Xử lý hủy đơn hàng
if (isset($_GET['remove_cart'])) {
    echo deleteCart($_GET['remove_cart']);
}

// Xử lý cập nhật đơn hàng
if (isset($_GET['update_cart'])) {
    echo updateCart($_GET['update_cart'], $_GET['state']);
}

?>
