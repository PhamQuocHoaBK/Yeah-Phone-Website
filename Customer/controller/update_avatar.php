<?php

	include "../model/db.php";

	/*get data from hienthi.js*/
	$db = new db();
	$db->connect();

if (isset($_POST['name']) && isset($_FILES['img'])) 
{
    $img_name = $_FILES['img']['name'];
    $img_size = $_FILES['img']['size'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];
    $user = $_POST['name'];
    $table = $_POST['table'];
    if ($error == 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_ex = array("jpg", "jpeg", "png");
        if (in_array($img_ex_lc, $allowed_ex)) 
        {
            $new_img_name = $user . '.' . $img_ex_lc;
            $result = $db->uploadImage($table, $user, $new_img_name, $tmp_name);
            if($result != "error") 
            {
                echo $result;
            }
                else echo "error";
            } 
            else 
            {
                $mess = "error";
                echo $mess;
            }
        } 
    else 
    {
        $mess = "error";
        echo $mess;
    }
}
 else echo "error";
?>
