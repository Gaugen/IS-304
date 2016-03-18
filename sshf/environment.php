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
<title>Miljø</title>
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
<body class="page1" id="top">
<!--==============================
              header
=================================-->
<div class="main">
<?php include("header.php");?>
<!--=====================
          Content
======================-->
<section id="content" class="inset__1">
<div class="container_12">
    <div class="grid_6">
      <div class="block-2">
       asd
      </div>
    </div>
    <div class="grid_6">
      <div class="block-2">
       asd
      </div>
    </div>
    <div class="clear"></div>
    <div class="grid_6">
      <div class="block-2">
        asd
      </div>
    </div>
    <div class="grid_6">
      <div class="block-2">
        asd
      </div>
    </div>
    <div class="clear"></div>
    <div class="grid_6">
      <div class="block-2">
        asd
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