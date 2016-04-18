<?php
include_once 'db_connect.php';
include_once 'functions.php';
require '../PHPMailer/PHPMailerAutoload.php';

if(isset($_POST['email']))
{
    $email = $_POST['email'];
	$subject = $_POST['subject'];
	$name = $_POST['name'];
	$message = $_POST['message'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
    {
        $message =  "Invalid email address please type a valid email!!";
    }
			
	$mail = new PHPMailer;
			
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'miljo.sshf@gmail.com';                   // SMTP username
	$mail->Password = 'SShf4400';               // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
	$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
	$mail->setFrom($email, $name);     //Set who the message is to be sent from
	//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
	$mail->addAddress($email);  // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');
	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
	//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
			 
	$mail->Subject = 'Subject:'.$subject;
	$mail->Body    = 'Hi, here is the message from '.$name.' <br/> <br/>'.$message.' <br><br> Please respond to: '.$email;
	//$mail->AltBody = 'Hi, <br/> <br/>Your Membership ID is '.$Results['id'].' <br><br>Click here to reset your password https://localhost/sshf/reset_password.php?encrypt='.$encrypt.'&action=reset';
	 
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
			 
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
	}
	
	else
	{
	echo 'Message has been sent';
	header( "refresh:3; ../index.php" ); //wait for 3 seconds before redirecting
	}
    
}
?>