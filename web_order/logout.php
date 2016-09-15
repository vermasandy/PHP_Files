<?php 
	session_start();
	//session_destroy();
	unset($_SESSION['userXId']);
	unset($_SESSION['userXname']);
	unset($_SESSION['userX']);
	header("location:index.php");
?>
