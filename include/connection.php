<?php			
			$host="localhost";
			$dbuser="root";
			$dbpass="";
			$connection=mysql_connect($host,$dbuser,$dbpass);
			mysql_select_db("voting_system",$connection);
?>