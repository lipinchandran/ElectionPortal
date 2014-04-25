<?php
session_start();
require_once('include/checkadmin.php');
require_once('include/connection.php');
//require_once('include/function.php');
?>
<div class="container">
<?php
	$admin_mail=mysql_query("select * from admin");
	$i=0;
	$email=array();
	while($admin_data=mysql_fetch_array($admin_mail))
	{
		$email[$i]=$admin_data['email'];
		echo $email[$i].'<br />';
		$num=rand();
		echo $num.'<br />';
		$result=mysql_query("insert into temppassword (a_id,password) values($admin_data['admin_id'],$num)");
		if(!$result)
		{
			die("Error-->".mysql_error());
		}
		$body="Your Tempary Password".$num;
	/*$body = $body."<a href='www.egresados.webatu.com'><b>Egresados</b></a><br />";
	$body=$body."To confirm your registration Please <a href='www.egresados.webatu.com/confirmation.php?code=".$code."'><b>Click Here</b></a>";
	$body=$body."<br /> Thank You For Registration<br /> ";
	$body=$body."<b>Your Sincerely <br /> Admin</b>";*/
		//exit;
	echo "$body";
		error_reporting(E_STRICT);
		//date_default_timezone_set('America/Toronto');
		require_once('Mail/phpmailer/class.phpmailer.php');
		$mail             = new PHPMailer();
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "mail.yourdomain.com"; // SMTP server
		$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;                   // set the SMTP port for the GMAIL server

		$mail->AddAddress($email[$i]);
			

		$mail->Username   = "sagar.vekriya@gmail.com";  // GMAIL username
		$mail->Password   = "sagypatel.1!!!4$$$3###";            // GMAIL password
		$mail->SetFrom('sagar.vekriya@gmail.com', 'Election Portal');
		$mail->AddReplyTo("sagar.vekriya@gmail.com","Election Portal");
		$mail->Subject    = "Authentication";
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$mail->MsgHTML($body);

		$mail->Send();
			
		echo "Email send successfully";
		$i++;
		}
		header("Loction:admin_otp.php");
?>