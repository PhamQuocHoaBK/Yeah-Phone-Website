<?php

	include "../model/db.php";

	/*get data from hienthi.js*/
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$newname = isset($_POST['newname']) ? $_POST['newname'] : '';
	$newphone = isset($_POST['newphone']) ? $_POST['newphone'] : '';
	$newmail = isset($_POST['newmail']) ? $_POST['newmail'] : '';
	$newdiachi = isset($_POST['newdiachi']) ? $_POST['newdiachi'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*update*/

	$from = "member";
	$where = "sdt='$newphone'";
	$num1  = $db->select_another($from, $where, $username);

	$from = "member";
	$where = "mail='$newmail'";
	$num2  = $db->select_another($from, $where, $username);


	if($num1>0 && $num2 >0 && $newmail != "")
	{
		echo json_encode(array("update"=>203));
	}

	else if($num1 > 0)
	{
		echo json_encode(array("update"=>201));
	}

	else if($num2 >0 && $newmail != "")
	{
		echo json_encode(array("update"=>202));
	}
	else
	{
		$update = "member";
		$set = "tendangnhap='$newname', mail = '$newmail', sdt='$newphone', diachi = '$newdiachi'";
		$where = "tendangnhap='$username'";
		$complete = $db->update($update, $set, $where);
		if($complete ="Update data Succesful!")
		{
			echo json_encode(array("update"=>200));
		}
	}

?>