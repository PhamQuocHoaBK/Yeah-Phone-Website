<?php

	include "../model/db.php";

	/*get data from cart.js*/
	$username = isset($_POST['username']) ? $_POST['username'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*xoa khoi gio hang*/
	$from = "cart";
	$where = "tendangnhap = '$username'";
	$complete = $db->delete_sp($from, $where);
	if($complete != "")
	{
		echo json_encode(array("delete"=>200));	
	}
	else
	{
		echo json_encode(array("delete"=>201));
	}
?>