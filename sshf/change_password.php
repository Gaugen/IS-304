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
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>
                <a href='change_password.php?action=change_password'>Click here to change your password</a>
            </p>
            <p> <a href="index.php">Or return to login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
		<?php
		if(@$_GET['action'] == "change_password"){ ?>
		<ul>
			<li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
        </ul>
		
			<form action='change_password.php?action=change_password' method='POST'><center>
			<br/>Current password: <input type='text' name='cp'><br/>
			New password: <input type='password' name='new_password' id="new_password" onkeyup='check()'><br/>
			Re-type password: <input type='password' name='confirm_password' id='confirm_password' onkeyup='check()'>
			<br/><span id='message'></span><br/>
			<input type='submit' name='change_pass' value='Change password' 
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

						echo "Your password has been changed, please log in again.";
						header( "refresh:3; ./index.php" ); //wait for 3 seconds before redirecting
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
<?php include("headerfooter/footer.php");?>
</body>
</html>
</html>