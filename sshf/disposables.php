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
<title>Engangs</title>
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
	
	<?php
	
	if(isset($_POST['update'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE tekstbokser SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'Forbruk'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM tekstbokser
		WHERE plassering = 'Forbruk'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($overskrift, $tekst);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	
	<?php if (login_check($mysqli) == true) {?>
   <div class="grid_6">
      <form  action="disposables.php" method="POST">
			<table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
			<tr><td colspan=3>Statisk tekst</td></tr>
			<tr>
			<td>Overskrift</td><td><input type=text size="35%" name="teksttopic" value="<?php echo $overskrift;?>"></td>
			</tr>
			<tr>
			<td>Informasjon</td><td><textarea name="tekstinfo" rows="10" cols="60"><?php echo $tekst;?></textarea></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="update" value="Post"></td>
			</tr>
			</table>
			</form>
	  
	  <?php }
	  else{?>
	  
   <div class="grid_6">
      <h2 class="inset__1"><?php echo $overskrift; ?></h2>
	  <p><font size="4"><?php echo $tekst; ?></p></font>
	<?php }?>
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
$q = "SELECT * FROM post WHERE kategori = 'Engangs'";
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