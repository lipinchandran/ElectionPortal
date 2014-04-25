

<?php

		

		$body = "Dear your request is accepted";
		echo $body;
		//exit;

		error_reporting(E_STRICT);
		//date_default_timezone_set('America/Toronto');
		require_once('C:/wamp/www/Mail/phpmailer/class.phpmailer.php');
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

		
				//$address = "kaushal.patel@enjayworld.com";   //to address
		$mail->AddAddress("ojharavi64344@gmail.com");
			

		$mail->Username   = "interactiveclassroom4@gmail.com";  // GMAIL username
		$mail->Password   = "ravi64344";            // GMAIL password
		$mail->SetFrom('interactiveclassroom4@gmail.com', 'Ensight Report');
		$mail->AddReplyTo("interactiveclassroom4@gmail.com","kaushal patel");
		$mail->Subject    = "Hello";
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$mail->MsgHTML($body);

		$mail->Send();
			
		echo "send successfully";
		
		

?>

