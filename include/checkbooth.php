<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	if(!isset($_SESSION['bid']))
	{
		header("Location:index.php");
	}
?>