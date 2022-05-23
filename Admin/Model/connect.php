<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "assignment";
$con = new mysqli($host, $user, $pass, $database);
if ($con->connect_error) die($con->connect_error);
