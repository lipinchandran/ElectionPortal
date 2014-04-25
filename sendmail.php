<?php
require_once('include/connection.php');
require_once('include/function.php');
?>
<?php
	$cid=$_GET['cid'];
	$user_id=$_SESSION['id'];
	$user_email_query=mysql_query("select email_id from voter where v_id='$user_id'");
	$count=mysql_num_rows($user_email_query);
	$user_email=mysql_fetch_array($user_email_query);
	echo $user_email['email_id'];
	$email=$user_email['email_id'];
	$num=rand();
	//mysql_query("insert into otp (otp_password) values(md5('$num'))");
	mysql_query("insert into otp (otp_password) values('$num')");
	$body="Your Voting Password Details are True for".$num;
	/*$body = $body."<a href='www.egresados.webatu.com'><b>Egresados</b></a><br />";
	$body=$body."To confirm your registration Please <a href='www.egresados.webatu.com/confirmation.php?code=".$code."'><b>Click Here</b></a>";
	$body=$body."<br /> Thank You For Registration<br /> ";
	$body=$body."<b>Your Sincerely <br /> Admin</b>";*/
		//exit;
	echo "$body";
		error_reporting(E_STRICT);
		//date_default_timezone_set('America/Toronto');
		require_once('C:/wamp/www/Election Portal/Mail/phpmailer/class.phpmailer.php');
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

		
				
		$mail->AddAddress($email);
			

		$mail->Username   = "sagar.vekriya@gmail.com";  // GMAIL username
		$mail->Password   = "sagypatel.1!!!4$$$3###";            // GMAIL password
		$mail->SetFrom('sagar.vekriya@gmail.com', 'Election Portal');
		$mail->AddReplyTo("sagar.vekriya@gmail.com","Election Portal");
		$mail->Subject    = "One Time Password";
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$mail->MsgHTML($body);

		$mail->Send();
		echo "Email send successfully";
		header("Location:voter_otp.php?cid=$cid");
?>