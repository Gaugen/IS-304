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
<title>Login</title>
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
        echo '<a href="login.php"><span>Login/Register</span></a></li>';
    ?>
	</a></div>
  <div class="container_12">
		<img src="images/logo.png" style="float:left" />
		<nav>
              <ul class="sf-menu">
               <li class="current">
			   <div class="dropdown">
				<button class="dropMenu">MENY</button>
					<div class="dropdown-content">
					<br>
					<h3><center>Skrive noe her kanskje?</center></h3>
					<br>
					<div class="grid_5">
					<a href="index.php">Hjem</a>
					<a href="documents.php">Dokumenter</a>
					<a href="about.php">Om oss</a>
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
                This is an example protected page.  To access this page, users
                must be logged in.  At some stage, we'll also check the role of
                the user, so pages will be able to determine the type of user
                authorised to access the page.
            </p>
            <p>Return to <a href="login.php"><button>login page</button></a></p>
			<p>Want to change your password? Click here <a href="change_password.php"><button>Change Password</button></a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="login.php"><button>login</button></a>.
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