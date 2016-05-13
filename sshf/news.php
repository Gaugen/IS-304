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
<?php include("headerfooter/header.php");?>
<!--=====================
          Content
======================-->
  <div class="clear"></div>
  <div class="clear"></div>
  
  
  <section id="content">
  
  <div class="container_12">
    <div class="grid_7 prefix_2">
	<center>
	<h2 style="margin-left: 95px;"><?php echo ($menu8); ?></h2>
	</center>
	<?php
	echo "<div class=newsNyheter>";
$q = "SELECT * FROM post WHERE kategori = 'Generell' ORDER BY newsno DESC";
$r = mysqli_query($mysqli, "$q");
if($r)
{

while($row=mysqli_fetch_array($r)){
	echo "<form action=index.php method=post>";
	echo "<div class=containerNyheter>";
	echo "<div class=newsheaderNyheter>";
	echo "<h7>";
	echo $row['newstopic'];
	echo "</h7>";
	echo "</div>";
	echo "<a href=image.php?newsno=".$row['newsno']." data-lightbox=roadtrip><img src=image.php?newsno=".$row['newsno']." width=180 height=180/></a>";
	echo "<div class=tbNyheter>";
	echo nl2br ($row['newsinfo']);
	echo "</div>";
	echo "</div>";
	echo "<div class=newsfooterNyheter>";
	echo 'Kategori: ' .	$row['kategori']; 
	echo "</div>";
	echo "</br>";
	echo "</br>";
	echo "</form>";
}
echo "</div>";

}

else
{
echo mysqli_error();
}
?>
	
	
 <h2 class="inset__1"></h2>
	  <br>
      
   
       <div class="grid_6">
         

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