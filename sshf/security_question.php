<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
<title>Security Question</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
<script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/forms.js"></script> 
</head>
    <body class="page1" id="top">

<!--==============================
              header
=================================-->
<div class="main">
<?php include("headerfooter/header.php");?>
<!--=====================
          Content
======================-->
<section id="content">
<div class="container_12">
    
   <div class="grid_6">
        <?php if (login_check($mysqli) == true) : ?>
            <p>Velkommen <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>
                Skriv inn passordet ditt og legg til/endre sikkerhetsspørsmål:<br>
            <form action="security_question.php?action=change" method="post" name="security_form">                      
            Passord: <input type="password" name="password" id="password"/><br>
			Sikkerhetsspørsmål:<input type='text' name='security_question'><br>
			Sikkerhetssvar:<input type='text' name='security_answer'><br>
            <input type="submit" name="change" value="Send inn" 
                   onclick="formhash(this.form, this.form.password, 'password');
				   formhash(this.form, this.form.security_answer, 'security_answer');" /> <br>
        </form>
			<?php
			//makes vaiables for the posts from the form.
			$password=@$_POST['password'];
			$security_question=@$_POST['security_question'];
			$security_answer=@$_POST['security_answer'];
			
			if(isset($_POST['change'])){
				//Using prepared statements means that SQL injection is not possible. 
				$stmt = $mysqli->prepare("SELECT password, salt
				FROM members
				WHERE username = ?
				LIMIT 1");
				$stmt->bind_param('s', $_SESSION['username']);  
				$stmt->execute();    // Execute the prepared query.
				$stmt->store_result();
				// get variables from result.
				$stmt->bind_result($db_password, $salt);
				$stmt->fetch();
				//Hashes and and uses the salt saved for the user.
				$check_curr = hash('sha512', $password . $salt);
				//Checks the current password given against the password in the database.
				if ($check_curr == $db_password) {
					$stmt = $mysqli->prepare("UPDATE members SET security_question = ?, security_answer = ?
											WHERE username = ?
											LIMIT 1");
					$stmt->bind_param('sss', $security_question, $security_answer, $_SESSION['username']);  
					$stmt->execute();    // Execute the prepared query.

						echo "Ditt sikkerhetsspørsmål og svar har blitt endret.";
						header('Location: ./protected_page.php?action=changed_security_question'); // redirecting
						exit();
					
					
                } 
				else {
                    // Wrong current password
					echo "Passordet stemmer ikke.";
                    return false;
                }
			}
			echo "</center></form>";
		
		?>
			
            <br><p>Gå tilbake til kontosiden din <a href="protected_page.php"><u>Tilbake</u></a></p>
			
        <?php else : ?>
            <p>
                <span class="error">Du har ikke autorisasjon til å se denne siden.</span> Vennligst <a href="login.php"><button>logg inn</button></a>.
            </p>
        <?php endif; ?>

    <div class="grid_3 alpha">
        
      </div>
    </div>
    <div class="grid_5 prefix_1">

    </div>
    <div class="clear"></div>
  </div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>