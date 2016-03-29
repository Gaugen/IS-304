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
<title>Avfall</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="Css/style.css">
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
<?php include("headerfooter/header.php");?>
<!--=====================
          Content
======================-->
<section id="content">

<h2 class="inset__1"></h2>
  
    <div class="grid_12">
	<img src="images/wide.jpg"/>
	<div class="container_12">
    <p class="color1">
    <div class="grid_6 prefix_1">
      <h2 class="inset__1">Avfall</h2>
     <div class="grid_3 alpha">
        <ul class="list-1 inset__1">
          <li><a href="#">abc </a></li>
        </ul>
      </div>
      
      
  </div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>