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
<title>About</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
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
<div class="topplinje"><a class="button" href="login.php"><?php 
    if(login_check($mysqli) == true){ 
        echo $_SESSION['username'];
        echo '<a href="logout.php"><span>&nbsp;Logout</span></a></li>';
        }
    elseif(login_check($mysqli) == false) 
        echo '<a href="register.php"><span>Login/Register</span></a></li>';
    ?></a></div>
  <div class="container_12">
		<img src="images/logo.png"  />
  <section id="stuck_container">
  <!--==============================
              Stuck menu
  =================================-->
    <div class="container_12">
        <div class="grid_12">
          <div class="navigation ">
            <nav>
              <ul class="sf-menu">
               <li><a href="index.php">Hjem</a></li>
               <li class="current"><a href="documents.php">Dokumenter</a></li>
               <li><a href="about.php">Om oss</a></li>
               <li><a href="environment.php">Miljø</a></li>
               <li><a href="contacts.php">Kontakt</a></li>
             </ul>
            </nav>
            <br><br>
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
    <div class="grid_9">
      <h2 class="inset__1">Dokumenter</h2>
      <p class="color1"><a href="#">Her kan du laste ned aaaaaaalt! </a></p>
      Dokumenter og statestikker på energiforbruk, reising, avfall osvosvosv.  <br>
      <div class="clear"></div>
    </div>
    <div class="grid_3">
      <h2 class="inset__1">2014</h2>
      <ul class="list-1">
        <li><a href="#">Fil 1 </a></li>
        <li><a href="#">Fil 2 </a></li>
        <li><a href="#">Fil 3 </a></li>
        <li><a href="#">Fil 4 </a></li>
        <li><a href="#">Fil 5 </a></li>
        <li><a href="#">Fil 6 </a></li>
        <li><a href="#">Fil 7 </a></li>
        <li><a href="#">Fil 8 </a></li>
      </ul>
    </div>
	 <div class="grid_6">
      <blockquote class="bq-1">
        <h4>Kanskje ett bilde?</h4>
        123123124414        
		<div class="ta__right">
          SSHF <br>2014
		 </div>
      </blockquote>
    </div>
    <div class="grid_12">
      <div class="sep-1 offset__1"></div>
    </div>
    <div class="grid_8">
       <h2 class="inset__1">2015</h2>
       <ul class="list-1">
        <li><a href="#">Fil 1 </a></li>
        <li><a href="#">Fil 2 </a></li>
        <li><a href="#">Fil 3 </a></li>
        <li><a href="#">Fil 4 </a></li>
        <li><a href="#">Fil 5 </a></li>
        <li><a href="#">Fil 6 </a></li>
        <li><a href="#">Fil 7 </a></li>
        <li><a href="#">Fil 8 </a></li>
      </ul>
    </div>
    <div class="grid_4">
      <blockquote class="bq-1">
        <h4>Kanskje ett bilde?</h4>
        123123124414        
		<div class="ta__right">
          SSHF <br>2015
        </div>
      </blockquote>
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
      <address class="address-1"> <div class="fa fa-home"></div>Egsveien 100, 4615 Kristiansand,  <br>
Telefon: 03738</address>
    </div>
    <div class="grid_3">
      <a href="#" class="mail-1"><span class="fa fa-envelope"></span>Knut-Kristian.Aas.Bjornstad@sshf.no</a>
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
      <div class="sub-copy">4400 &copy; <span id="copyright-year"></span> | <a href="#">Privacy Policy</a> <br> Nettsiden er laget som ett bachelor prosjekt av <a href="https://www.facebook.com/steffangraf" rel="nofollow">group 4400</a></div>
    </div>
    <div class="clear"></div>
  </div>
</footer>
<a href="#" id="toTop" class="fa fa-angle-up"></a>
</body>
</html>