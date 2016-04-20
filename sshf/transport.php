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
<title>Transport</title>
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
<div class="grid_6">
      <h2 class="inset__1">Transport</h2>
	  <p><font size="4">Hei og velkommen til siden, håper du koser deg og at du får ett nytt syn på din forbruk av glass, reising osv. 
	  <br>Her kommer en del info om siden og hva siden kan tilby! Ha en ellers fortreffelig dag :)</p></font>
	  
    </div>
	<div class="grid_4">
	</br>
        <ul class="list-1  prefix_3">
          <li><a href="transport.php">Transport </a></li>
		  <li><a href="energi.php">Energi </a></li>
		  <li><a href="avfall.php">Avfall </a></li>
		  <li><a href="disposables.php">Engangs </a></li>
        </ul>
		<br>
      </div>
    <div class="grid_5 prefix_1">
	<?php
	echo "</br>";
	echo "<div class=newsekkoKategori>";
$q = "SELECT * FROM post WHERE kategori = 'Transport'";
$r = mysqli_query($mysqli, "$q");
if($r)
{

while($row=mysqli_fetch_array($r)){
	echo "<form action=index.php method=post>";
	echo "<div class=container2>";
	echo "<div class=newsheader2>";
	echo "<h7>";
	echo $row['newstopic'];
	echo "</h7>";
	echo "</div>";
	echo "<a href=image.php?newsno=".$row['newsno']." data-lightbox=roadtrip><img src=image.php?newsno=".$row['newsno']." width=180 height=180/></a>";
	echo "<div class=tb22>";
	echo "<pre>";
	echo $row['newsinfo'];
	echo "</pre>";
	echo "</div>";
	echo "</div>";
	echo "<div class=newsfooter2>";
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
    </div>
  </div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>