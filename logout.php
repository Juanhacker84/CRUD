<?php 
	include_once"include/db.php";
	session_destroy();
	header('location : login.php');
	echo "sukses logout";
 ?>