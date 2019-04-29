<?php
	session_start();
	$_SESSION['userid']="";
	session_unset();
	session_destroy();

	header("location:login.php");

?>