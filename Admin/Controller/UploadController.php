<?php
if (isset($_POST['name']) && isset($_FILES['img'])) {

    require "../Model/UploadModel.php";

    $img_name = $_FILES['img']['name'];
    $img_size = $_FILES['img']['size'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];
    $user = $_POST['name'];
    $table = $_POST['table'];

    if ($error == 0) {
        if ($img_size < 150000) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_ex = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_ex)) {
                $new_img_name = $user . '.' . $img_ex_lc;

                // Add to database
                $result = uploadImage($table, $user, $new_img_name, $tmp_name);
                if($result == 0) echo "Success";
                else echo "Error: " . $result;
            } else {
                $mess = "You can't upload file of this type !";
                echo $mess;
            }
        } else {
            $mess = "Sorry, your image is too large !";
            echo $mess;
        }
    } else {
        $mess = "Error";
        echo $mess;
    }
} else echo "Somthing wrong";
?>