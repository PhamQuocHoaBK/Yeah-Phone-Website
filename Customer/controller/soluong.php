<?php

	include "../model/db.php";

	/*get data from dangnhap.js*/
	$username = isset($_POST['username']) ? $_POST['username'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*them vao gio hang*/
	$from = "cart";
	$where = "tendangnhap='$username'";
	$soluong = $db->select_sl($from, $where);
	echo json_encode($soluong);
?>