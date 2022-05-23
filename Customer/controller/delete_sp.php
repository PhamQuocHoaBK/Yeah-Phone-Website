<?php

	include "../model/db.php";

	/*get data from cart.js*/
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$msp = isset($_POST['msp']) ? $_POST['msp'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*xoa khoi gio hang*/
	$from = "cart";
	$where = "tendangnhap = '$username' AND msp = '$msp'";
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