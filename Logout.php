<?php
	session_start();	
	session_destroy();
	$_SESSION["adminid"]=null;
	$_SESSION["studentid"]=null;
	header("Location:index.php");
?>
