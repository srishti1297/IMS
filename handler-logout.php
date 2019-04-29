<?php
	session_start();
	$_SESSION['handlerid']="";
	session_unset();
	session_destroy();

	header("location:handler-login.php");

?>