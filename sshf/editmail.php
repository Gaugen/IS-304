<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

			//makes vaiables for the posts from the form.
			$new_mail=@$_POST['new_mail'];
			$confirm_mail=@$_POST['confirm_mail'];
			//sets new email adress to recieve mails form the mailform on the contact page
			if(isset($_POST['change_mail'])){
					if($new_mail == $confirm_mail){
						$stmt = $mysqli->prepare("UPDATE active_mail SET email = ? WHERE id = 1 LIMIT 1");
						$stmt->bind_param('s', $new_mail);  
						$stmt->execute();    // Execute the prepared query.

						echo "Mottaker Email har blitt endret!";
						header( "refresh:3; ./admin-panel.php#tab5" ); //wait for 3 seconds before redirecting
					
					}
					else {
						echo "Mail-adressene er ikke like, vennligst prøv igjen.";
						return false;
					}
               }
		?>