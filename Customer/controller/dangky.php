<?php
	include "../model/db.php";

	/*get data from dangky.js*/
	$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
	$account = isset($_POST['account']) ? $_POST['account'] : '';
	$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
	$pass_again = isset($_POST['pass_again']) ? $_POST['pass_again'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*check duplicate phone or account*/
	$from = "member";
	$where = "sdt = '$phone'";
	$num1 = $db->select($from, $where);


	$from = "member";
	$where = "tendangnhap = '$account'";
	$num2 = $db->select($from, $where);

	if ($num1 > 0 && $num2 > 0) 
	{
		$error['phone'] = true;
		$error['account'] = true;
		echo json_encode(array("status"=>203));
	}

	else if ($num1 > 0) 
	{
		$error['phone'] = true;
		echo json_encode(array("status"=>201));
	}

	else if ($num2 > 0) 
	{
		$error['account'] = true;
		echo json_encode(array("status"=>202));
	}

	if($num1 == 0 && $num2 == 0)
	{
		echo json_encode(array("status"=>200));
	}

	/*insert database*/
	if(empty($error))
	{
		$into =  "member (sdt, tendangnhap, matkhau)";
		$value = "('$phone', '$account', '$pass')";
		$db->insert($into, $value);
	}
?>