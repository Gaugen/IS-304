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
<html lang="en">
<head>
<title>Om oss</title>
<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/script.js"></script> 
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
 }); 
</script>
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
    <div class="grid_5">
      <h2 class="inset__1">Ekko!</h2>
      <p class="color1">
    <div class="grid_6 prefix_1">
      <h2 class="inset__1">heihei!</h2>
     <div class="grid_3 alpha">
        <ul class="list-1 inset__1">
          <li><a href="#">abc </a></li>
          <li><a href="#">abc</a></li>
          <li><a href="#">abc</a></li>
          <li><a href="#">abc </a></li>
        </ul>
      </div>
      <div class="grid_3 omega">
        <ul class="list-1 inset__1">
          <li><a href="#">def </a></li>
          <li><a href="#">def</a></li>
          <li><a href="#">def</a></li>
          <li><a href="#">def </a></li>
        </ul>
      </div>
      <div class="clear"></div>
    </div>
    <div class="grid_12">
      <div class="sep-1 offset__1"></div>
    </div>  
    <div class="grid_5">
      <h3 class="offset__1">Meir info?!</h3>
      <p class="colo1"><a href="#">sjå på da!</div>
    <div class="grid_6 prefix_1">
      <h3 class="offset__2">Tuddelu!</h3>
      <img src="images/page3_img1.jpg" alt="" class="fleft">
      <div class="extra_wrapper">
        <p class="color1">Fin farge!</p>
        asdsada
		<a href="#" class="link-1">mer?!</a>
      </div>
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