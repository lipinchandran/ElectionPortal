<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	if(!isset($_SESSION['aid']))
	{
		header("Location:index.php");
	}
?>