<?php
//session_start();
//require_once('include/checkadmin.php');
require_once('include/connection.php');
//require_once('include/function.php');
require_once('Mail/phpmailer/class.phpmailer.php');
include('mailSend.php');
?>
<?php
	$admin_mail=mysql_query("select * from admin");
	$count=mysql_num_rows($admin_mail);
	echo $count;
	//$admin_data=mysql_fetch_array($admin_mail);
	//$i=1;
	//$result=mysql_query("insert into temppassword (password1,password2,password3,password4) values(md5('$num1'),md5('$num2'),md5('$num3'),md5('$num4'))");
	while($admin_data=mysql_fetch_array($admin_mail))
	{
		$aid=$admin_data['admin_id'];
		$email=$admin_data['email'];
		mailSend($aid,$email);
		echo $email;
		//$i++;
		//echo $num.'<br />';
	}
		header("Loction:admin_otp.php");
?>