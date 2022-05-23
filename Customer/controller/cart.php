<?php

	include "../model/db.php";

	/*get data from dangnhap.js*/
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$msp = isset($_POST['msp']) ? $_POST['msp'] : '';
	$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*them vao gio hang*/
	$from = "cart";
	$where = "msp = '$msp' AND tendangnhap='$username'";
	$num = $db->select($from, $where);
	if($num == 0)
	{
		$into = "cart (tendangnhap, msp, soluong)";
		$value = "('$username', '$msp', '$soluong')";
		$db->insert($into, $value);
	} 
	if($num == 1)
	{
		$update = "cart";
		$set = "soluong = '$soluong'";
		$where = "msp = '$msp'";
		$db->update($update, $set, $where);
	}

?>