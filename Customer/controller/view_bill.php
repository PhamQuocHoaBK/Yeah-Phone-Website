<?php

	include "../model/db.php";

	/*get data from binhluan.js*/
	$username = isset($_POST['username']) ? $_POST['username'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*view cmt*/

	$from = "bill";
	$where = "tendangnhap='$username'";
	$all_bill = $db->select_bill($from, $where);
	echo json_encode($all_bill);
?>