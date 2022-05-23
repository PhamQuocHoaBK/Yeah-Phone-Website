<?php

	include "../model/db.php";

	/*get data from hienthi.js*/
	$account = isset($_POST['username']) ? $_POST['username'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*check account and pass*/
	$from = "member";
	$where = "tendangnhap='$account'";
	$info  = $db->select_item($from, $where);

	echo json_encode($info);

?>