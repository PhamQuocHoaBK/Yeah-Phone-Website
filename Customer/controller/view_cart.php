<?php

	include "../model/db.php";

	/*get data from dangnhap.js*/
	$username = isset($_POST['username']) ? $_POST['username'] : '';

	/*connect database*/
	$db = new db();
	$db->connect();

	/*them vao gio hang*/

	$msp = [];
	$from = "cart";
	$where = "tendangnhap='$username'";
	$msp = $db->select_cart($from, $where);


   	$count  = 0;
   	$info_sp = [];
   	if(count($msp) > 0)
   	{
   		while($count < count($msp))
		{
			$arr_tmp = [];
			$tmp = $msp[$count];
			$from = "product";
			$where = "msp='$tmp'";
			$arr_tmp =  $db->select_product($from, $where);
			array_push($info_sp, $arr_tmp);
			$count = $count + 1;
		}
   	}
   echo json_encode($info_sp);
	


?>