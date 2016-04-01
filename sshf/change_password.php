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
<title>Login</title>
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
<?php include("header.php");?>
<!--=====================
          Content
======================-->
<section id="content">
<div class="container_12">
    
   <div class="grid_6">
        <?php if (login_check($mysqli) == true) : ?>
            <p>Velkommen <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>
                <a href='change_password.php?action=change_password'>Her kan du bytte passord</a>
            </p>
            <p>Tilbake til <a href="index.php">innloggingssiden</a></p>
        <?php else : ?>
            <p>
                <span class="error">Du har ikke rettigheter til å se denne siden.</span> Vennligst <a href="index.php">logg inn</a>.
            </p>
        <?php endif; ?>
		<?php
		if(@$_GET['action'] == "change_password"){ ?>
		
			<form action='change_password.php?action=change_password' method='POST'><center>
			Nåværende passord: <input type='text' name='cp'><br/>
			Nytt passord: <input type='password' name='np'><br/>
			Bekreft passord: <input type='password' name='rp'><br/>
			<input type='submit' name='change_pass' value='Change' 
				onclick="formhash(this.form, this.form.cp, 'curr_pass');formhash(this.form, this.form.np, 'new_pass');formhash(this.form, this.form.rp, 're_pass');">
			<br />
			<?php
			//makes vaiables for the posts from the form.
			$curr_pass=@$_POST['curr_pass'];
			$new_pass=@$_POST['new_pass'];
			$re_pass=@$_POST['re_pass'];
			
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

						echo "Your password has been changed, please log in again.";
						header( "refresh:3; ./index.php" ); //wait for 5 seconds before redirecting
						exit();
					}
					else {
						echo "New passwords don't match";
						return false;
					}
                } 
				else {
                    // Wrong current password
					echo "Current password given is not correct.";
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
<?php include("footer.php");?>
</body>
</html>
</html>