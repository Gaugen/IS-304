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
<!-- General design handlers <-->
<html lang="en">
<head>
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
<title>Transport</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/lightbox.css">
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
	<img src="images/transport.jpg"/>
	</div>
	<div class="container_12">
	<div class="grid_2">
	<br>
	</br>
        <ul class="list-1 ">
          <li><a href="transport.php"><font size="4">Transport </font></a></li>
		  <li><a href="energi.php"><font size="4">Energi </font></a></li>
		  <li><a href="avfall.php"><font size="4">Avfall </font></a></li>
		  <li><a href="disposables.php"><font size="4">Engangsartikler</font></a></li>
        </ul>
		<br>
      </div>
	  
	<?php
	
	if(isset($_POST['update'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE tekstbokser SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'Transport'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM tekstbokser
		WHERE plassering = 'Transport'
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
	<!-- Check if you're logged in. If so - give option to change content of page --> 
   <div class="grid_15">
   <br>
         <form  action="transport.php" method="POST">
	  <h2 class="inset__1"><?php echo nl2br ($overskrift); ?></h2>
	  <p><font size="4"><?php echo nl2br ($tekst); ?></p></font>
<div class="dropdownIndex">
<submit onclick="myIndexFunction()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Overskrift</td><td><input type=text size="35%" name="teksttopic" value="<?php echo     $overskrift;?>"></td>
  </tr>
  <tr>
  <td>Informasjon</td><td><textarea name="tekstinfo" rows="10" cols="60"><?php echo $tekst;?>     </textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
	   	<!-- If you're not logged in, display this --> 
	  <?php }
	  else{?>
	 
   <div class="grid_15">
   <br>
      <h2 class="inset__1"><?php echo nl2br ($overskrift); ?></h2>
	  <p><font size="4"><?php echo nl2br ($tekst); ?></p></font>
	<?php }?>
    </div>
    <div class="grid_4">
	<br>
	<?php
	echo "</br>";
	echo "<div class=newsekkoKategori>";
$q = "SELECT * FROM post WHERE kategori = 'transport.php' ORDER BY newsno DESC"; //Get contents from mysql, for newsfeed
$r = mysqli_query($mysqli, "$q");
if($r)
{

// What to print from mysql and index.php
while($row=mysqli_fetch_array($r)){
	echo "<form action=index.php method=post>";
	echo "<div class=container2>";
	echo "<div class=newsheader2>";
	echo "<h7>";
	echo $row['newstopic'];
	echo "</h7>";
	echo "</div>";
	echo "<a href=image.php?newsno=".$row['newsno']." data-lightbox=roadtrip><img style='border:1px solid #ADADAD' src=image.php?newsno=".$row['newsno']." width=180 height=180/></a>";
	echo "<div class=tb22>";
	echo nl2br ($row['newsinfo']);
	echo "</div>";
	echo "</div>";
	echo "<div class=newsfooter2>";
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
<script src="js/lightbox-plus-jquery.js"></script>
</body>
</html>