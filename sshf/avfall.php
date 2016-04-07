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
	</div>
	<div class="container_12">
	
    <p class="color1">
    <div class="grid_6 prefix_5">
      <h2 class="inset__1">Avfall</h2>
	</div>
	  <br>
     <div class="grid_3 prefix_3">
	 hello from<br>
	 the other side<br>
	 hello from<br>
	 the other side<br>

      </div>
	       <div class="grid_4">
        <ul class="list-1  prefix_5">
          <li><a href="transport.php">Transport </a></li>
		  <li><a href="energi.php">Energi </a></li>
		  <li><a href="avfall.php">Avfall </a></li>
		  <li><a href="disposables.php">Engangs </a></li>
        </ul>
		<br>
      </div>
      
      </div>
  
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>