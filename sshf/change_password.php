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
<header>
<div class="topplinje"><a class="button" href="login.php">
<?php 
    if(login_check($mysqli) == true){ 
       	echo '<a href="admin-panel.php"><span>Admin &nbsp;</span></a></li>';
		echo '<a>&nbsp;|&nbsp;</a>';
		echo $_SESSION['username'];
		echo '<a>&nbsp;|&nbsp;</a>';
        echo '<a href="includes/logout.php"><span>&nbsp;Logout</span></a></li>';
        }
    elseif(login_check($mysqli) == false) 
        echo '<a href="login.php"><span></span></a></li>';
    ?>
	</a></div>
  <div class="container_12">
		<img src="images/logo.png" style="float:left" />
		<nav>
              <ul class="sf-menu">
               <li class="current">
			   <div class="dropdown">
				<button onclick="myFunction()" class="dropbtn">MENY</button>
					<div id="myDropdown" class="dropdown-content">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<div class="grid_5">
					
					<a href="index.php">Hjem</a>
					<a href="documents.php">Dokumenter</a>
					<a href="about.php">Om oss</a>
					
					<form action="login.php"><button class="btnLogin">Logg inn</button></form>
					</div>
					<div class="grid_5">
					
					<a href="environment.php">Miljø</a>
					<a href="contacts.php">Kontakt</a>
					
					</div>
					</div>
				</div></li>
             </ul>
            </nav>
  <section id="stuck_container">
  
  <!--==============================
              Stuck menu
  =================================-->
    <div class="container_12">
        <div class="grid_12">
          <div class="navigation ">
                    
		  <hr class="skille">
         <div class="clear"></div>
     </div>
     <div class="clear"></div>
    </div>
  </section>
</header>
<!--=====================
          Content
======================-->
<section id="content">
<div class="container_12">
    
   <div class="grid_6">
        <?php if (login_check($mysqli) == true) : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>
                <a href='change_password.php?action=change_password'>Here you can change your password</a>
            </p>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
		<?php
		if(@$_GET['action'] == "change_password"){ ?>
		
			<form action='change_password.php?action=change_password' method='POST'><center>
			Current password: <input type='text' name='cp'><br/>
			New password: <input type='password' name='np'><br/>
			Re-type password: <input type='password' name='rp'><br/>
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
              footer_top
=================================-->
<div class="footer-top">
  <div class="container_12">
    <div class="grid_12">
      <div class="sep-1"></div>
    </div>
    <div class="grid_4">
      <address class="address-1"> <div class="fa fa-home"></div>Sørlandet sykehus HF  <br>
Teknologi og E-helse.</address>
    </div>
    <div class="grid_3">
      <a href="#" class="mail-1"><span class="fa fa-envelope"></span>miljo@sshf.no</a>
    </div>
    <div class="grid_4 fright">
      <div class="socials">
        <a href="#">facebook</a>
        <a href="#">twitter</a>
        <a href="#">google+</a>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--==============================
              footer
=================================-->
</div>
<footer id="footer">
  <div class="container_12">
    <div class="grid_12">
      <div class="sub-copy">4400 &copy; <span id="copyright-year"></span> | <a href="#">Privacy Policy</a> <br> Nettsiden er laget som ett bachelor prosjekt av <a href="https://www.facebook.com/steffangraf" rel="nofollow">gruppe 4400.</a></div>
    </div>
    <div class="clear"></div>
  </div>
</footer>
<a href="#" id="toTop" class="fa fa-angle-up"></a>
</body>
</html>