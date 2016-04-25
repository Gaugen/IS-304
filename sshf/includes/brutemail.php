<?php
include_once 'db_connect.php';
include_once 'functions.php';


function sendbrute($email, $mysqli)
{
	require '../PHPMailer/PHPMailerAutoload.php';
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
	{
		$message =  "Invalid email address please type a valid email!!";
	}
	else
	{
		$query = "SELECT id, security_question FROM members where email='".$email."'";
		$result = mysqli_query($mysqli,$query);
		$Results = mysqli_fetch_array($result);
	
		if(count($Results)>=1)
		{
			$encrypt = md5(1290*3+$Results['id']);
			$security_question = $Results['security_question'];
			
			$mail = new PHPMailer;
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'miljo.sshf@gmail.com';                   // SMTP username
			$mail->Password = 'SShf4400';               // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
			$mail->setFrom('miljo.sshf@gmail.com', 'Knut');     //Set who the message is to be sent from
			//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
			$mail->addAddress($email);  // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
			//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML
				 
			$mail->Subject = 'Kontoen låst';
			$mail->Body    = 'Kontoen din er låst på grunn av for mange innloggingsforsøk.<br/> <br/>Din brukerID er '.$Results['id'].'<br/><br/> Ditt sikkerhetsspørsmål er: '.$Results['security_question'].'<br><br>Kjenner du ikke igjen denne aktiviteten, kontakt administrator. <br><br>Ellers klikk her for å låse opp kontoen din https://localhost/sshf/open_brute.php?encrypt='.$encrypt.'&action=reset';
			//$mail->AltBody = 'Hi, <br/> <br/>Your Membership ID is '.$Results['id'].' <br><br>Click here to reset your password https://localhost/sshf/reset_password.php?encrypt='.$encrypt.'&action=reset';
			 
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
			 
			if(!$mail->send()) {
			   echo 'Meldingen kunne ikke bli sendt.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
			   exit;
			}
				 
			echo 'Kontoen din er bli låst, en mail er sendt til deg for mer informasjon.';
			header( "refresh:5; ../login.php" ); //wait for 5 seconds before redirecting
			exit();
			
		}
		else
		{
			$message = "Ingen bruker med den email adressen.";
		}
	}
}
?>