<?php
	include "../model/db.php";

	/*get data from cart.js*/
	$username= isset($_POST['username']) ? $_POST['username'] : '';
	$tensp= isset($_POST['tensp']) ? $_POST['tensp'] : '';
	$msp= isset($_POST['msp']) ? $_POST['msp'] : '';
	$gia= isset($_POST['gia']) ? $_POST['gia'] : '';
	$soluong= isset($_POST['soluong']) ? $_POST['soluong'] : '';
	$trangthai = "wait";
	/*connect database*/
	$db = new db();
	$db->connect();


	/*insert database*/
	$into =  "bill (tendangnhap, tensp, msp, gia, soluong, trangthai)";
	$value = "('$username', '$tensp', '$msp', '$gia', '$soluong', '$trangthai')";
	$db->insert($into, $value);
?>