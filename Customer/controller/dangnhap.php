<?php

	include "../model/db.php";

	/*get data from dangnhap.js*/
	$phone_account = isset($_POST['phone_account']) ? $_POST['phone_account'] : '';
	$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*check account and pass*/
	if(is_numeric($phone_account))
	{
		$from = "member";
		$where = "sdt='$phone_account' AND matkhau='$pass'";
		$num  = $db->select($from, $where);	
		$phone_account = $db->select_username($from, $where);
	}
	else
	{
		$from = "member";
		$where = "tendangnhap='$phone_account' AND matkhau='$pass'";
		$num  = $db->select($from, $where);

	}

	$array_data = [];
	if($num >0) 
	{
		$data_receive = array("status" => 300, "name" => $phone_account);
		array_push($array_data, $data_receive);
		echo json_encode($array_data);
	}
	else
	{
		$data_receive = array("status" => 301, "name" => $phone_account);
		array_push($array_data, $data_receive);
		echo json_encode($array_data);
	}
?>