<?php

	include "../model/db.php";

	/*get data from hienthi.js*/
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$newpass = isset($_POST['newpass']) ? $_POST['newpass'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*update*/

	
	$update = "member";
	$set = "matkhau='$newpass'";
	$where = "tendangnhap='$username'";
	$complete = $db->update($update, $set, $where);
	if($complete ="Update data Succesful!")
	{
		echo json_encode(array("update"=>200));
	}
?>