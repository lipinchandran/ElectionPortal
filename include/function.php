<?php
	session_start();
	function login()
	{
		if(isset($_SESSION['id']) && !empty($_SESSION['id']))
		{
			return true;
		}
		else
		{
			return false;
			
		}
	}
?>