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
<?php include("header.php");?>
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
              footer
=================================-->
<?php include("footer.php");?>
</body>
</html>