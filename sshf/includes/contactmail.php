<?php
include_once 'db_connect.php';
include_once 'functions.php';
require '../PHPMailer/PHPMailerAutoload.php';

if ($stmt = $mysqli->prepare("SELECT email FROM active_mail WHERE id = 1
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($active_mail);
        $stmt->fetch();}

if(isset($_POST['email']))
{
    $email = $_POST['email'];
	$subject = $_POST['subject'];
	$name = $_POST['name'];
	$message = $_POST['message'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
    {
        $message =  "Ikke gyldig mailadresse, skriv inn på nytt!!";
		header( "refresh:3; ../contacts.php" ); //wait for 3 seconds before redirecting
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
	$mail->addAddress($active_mail);  // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');
	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
	//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
			 
	$mail->Subject = 'Subject:'.$subject;
	$mail->Body    = 'Hei, her er en henvendelse fra '.$name.' <br/> <br/>'.$message.' <br><br> Vennligst send svar til: '.$email;
			 
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
	}
	
	else
	{
	echo 'Meldingen ble sendt';
	header( "refresh:3; ../contacts.php" ); //wait for 3 seconds before redirecting
	}
    
}
?>