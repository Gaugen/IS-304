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
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
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
<?php include("headerfooter/header.php");?>
<!--=====================
          Content
======================-->
  <div class="clear"></div>
  <div class="clear"></div>
  
  
  <section id="content">
  <div class="container_12">
    <div class="grid_6 prefix_3">

	
      <h2 class="inset__1">Velkommen til Sørlandet sykehus HF Miljø!</h2>
	  <br>
      
   
       <div class="grid_6">
          Sørlandet sykehus HF (SSHF) er områdesykehus for befolkningen i Agderfylkene, og har også lokalsykehusfunksjon for kommunene Lund og Sokndal i Rogaland. Befolkningsgrunnlaget over 290.000. <br>
          Miljøavdelingen har det overordnede ansvar for å samle inn, samt rapportere og bevisstgjøre ansatte og andre interessenter om miljø-relaterte faktorer på Sykehuset.<br> Dette kan omhandle blant annet; Bruk av engangsglass, antall kilometer kjørt med arbeidsbiler, energibruk, m.m. 
					 <br><br>Denne siden er designet som en arena for å vise fram disse miljø-dataene. Den blir drevet og administret av miljøansvarlig på Sykehuset. Håper du finner det du leter etter!
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
         </div>
   
    
    </div>
     <div class="clear"></div>
     <div class="clear"></div>
    <div class="clear"></div>
  </div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>