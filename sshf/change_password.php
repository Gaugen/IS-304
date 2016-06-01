<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
<title>Change password</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
		<link rel="stylesheet" href="css/contact-form.css">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" type="text/css" href="css/change_password.css" />
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
                <a href='change_password.php?action=change_password'><u>Trykk her for å endre passord</u></a>
            </p>
            <p> <a href="protected_page.php"><u>Eller trykk her for å gå tilbake til kontosiden din</u></a></p>
        <?php else : ?>
            <p>
                <span class="error">Du har ikke autorisasjon til å se denne siden.</span> Vennligst <a href="login.php"><button>logg inn</button></a>.
            </p>
        <?php endif; ?>
		<?php
		if(@$_GET['action'] == "change_password"){ ?>
		<ul>
			<li>Passordet må være minst 6 karakterer langt</li>
            <li>Passordet må inneholde:
                <ul>
                    <li>Minst en stor bokstav(A..Å)</li>
                    <li>Minst en liten bokstav(a..å)</li>
                    <li>Minst et tall(0..9)</li>
                </ul>
            </li>
        </ul>
		
			<form action='change_password.php?action=change_password' method='POST'><center>
			<br/>Nåværende passord: <input type='text' name='cp'><br/>
			Nytt passord: <input type='password' name='new_password' id="new_password" onkeyup='check()'><br/>
			Gjenta passord: <input type='password' name='confirm_password' id='confirm_password' onkeyup='check()'>
			<br/><span id='message'></span><br/>
			<input type='submit' name='change_pass' value='Bytt passord' 
				onclick="formhash(this.form, this.form.cp, 'curr_pass');passcheck(this.form, this.form.new_password, 'new_password');passcheck(this.form, this.form.confirm_password, 'confirm_password');">
			<br />
			<?php
			//makes vaiables for the posts from the form.
			$curr_pass=@$_POST['curr_pass'];
			$new_pass=@$_POST['new_password'];
			$re_pass=@$_POST['confirm_password'];
		
			if(isset($_POST['change_pass'])){
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
				$check_curr = hash('sha512', $curr_pass . $salt);
				//Checks the current password given against the password in the database.
				if ($check_curr == $db_password) {
					if($new_pass == $re_pass){
						$stmt = $mysqli->prepare("UPDATE members SET password = ?
												WHERE username = ?
												LIMIT 1");
						$stmt->bind_param('ss', hash('sha512', $new_pass . $salt), $_SESSION['username']);  
						$stmt->execute();    // Execute the prepared query.

						echo "Passordet ditt har blitt endret, vennligst logg inn med det nye passordet.";
						header('Location: ./protected_page.php?action=changed_password'); // redirecting
						exit();
					}
					else {
						echo "De nye passordene er ikke like";
						return false;
					}
                } 
				else {
                    // Wrong current password
					echo "Nåværende passord er ikke riktig.";
                    return false;
                }
			}
			echo "</center></form>";
		}
		?>
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
</html>