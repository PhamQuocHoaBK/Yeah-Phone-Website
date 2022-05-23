<?php

	include "../model/db.php";

	/*get data from binhluan.js*/
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$msp = isset($_POST['msp']) ? $_POST['msp'] : '';
	$date = isset($_POST['date']) ? $_POST['date'] : '';
	$cmt =  isset($_POST['cmt']) ? $_POST['cmt'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*insert cmt*/
	if($username != "" && $date !="" && $cmt != "")
	{
		$into = "comment (tendangnhap, msp, cmt, time)";
		$value = "('$username', '$msp', '$cmt', '$date')";
		$db->insert($into, $value);
	}
	/*view cmt*/

	$from = "comment";
	$where = "msp='$msp'";
	$all_cmt = $db->select_cmt($from, $where);
	echo json_encode($all_cmt);
?>