<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
<title>Registrer</title>
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
   
   
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h2 class="inset__1">Registrer deg</h2>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
            Username: <input type='text' 
                name='username' 
                id='username' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Password: <input type="password"
                             name="password" 
                             id="password"/><br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
        <p>Return to the <a href="login.php"><button>login page</button></a>.</p>
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