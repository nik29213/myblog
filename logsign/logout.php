<?php
include_once "project.php";
	session_start();
	if( isset($_SESSION["uid"]) ){
		session_destroy();
		header("location:".$loc."index.php");
		exit();
	}
		header("location:".$loc."index.php");
		exit();
?>