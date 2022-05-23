<?php
require "../Model/base.php";

function getData($request, $user) {
    switch($request) {
        case "Infor":
            return getInfo($user);
        case "Member":
            return getMembers();
        case "Product":
            return getProducts();
        case "Comment":
            return getComment();
        case "Cart":
            return getCart();
        default:
            break;
    }
}
?>

