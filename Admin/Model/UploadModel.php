<?php
require "connect.php";

function uploadImage($table, $user, $img, $tmp_name)
{
    $img_upload_path = "../Model/Img/" . $img;
    move_uploaded_file($tmp_name, $img_upload_path);

    global $con;
    $sql = "UPDATE $table SET img='$img' WHERE user='$user' ";
    if ($con->query($sql) !== true) {
        return $con->error;
    }
    else return 0;
}

?>