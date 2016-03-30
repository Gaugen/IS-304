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
<title>Kontakt</title>
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
<?php include("headerfooter/header.php");?>
<!--=====================
          Content
======================-->
<section id="content">
  <div class="container_12">
    <div class="grid_10">
	
	<text>Hvor mange engangsglass bruker du per dag?</text>
<text><br>Hvor mange kilometer kjører du per dag?</text>

<form method='post'>
<input type='text' name='value1'>
 
<select name='forbruk'>
<option value2="Engangsglass">Engangsglass</option>
<option value3="Bensinforbruk">Bensinforbruk</option>


</select>



<input type='submit' name='submit' value='Kalkuler'></form>

<?php



//Input tall i value1, hent databaseverdier for value 2 og 3 
if(isset($_POST['submit'])){

$sql = "SELECT * FROM calculator";
$result_set=mysqli_query($mysqli, $sql);
$x=mysqli_fetch_array($result_set); 	
	
$value1 = $_POST['value1'];
$forbruk = $_POST['forbruk'];
$value2 = $x['engangsglass'];
$value3 = $x['bensinforbruk'];


//Hvis engangsglass er valgt, gang value1(dynamisk) med value2(fra database)
if($forbruk=="Engangsglass"){
echo "<b>Du bruker engangsglass for verdi:</b><br>";
echo $value1*$value2 . " kroner"; 
}


if($forbruk=="Engangsglass"){
echo "<br><b>I en arbeidsuke blir dette:</b><br>";
echo $value1*$value2*5 . " kroner"; 
}

if($forbruk=="Engangsglass"){
echo "<br><b>I et arbeidsår (230 dager) blir dette:</b><br>";
echo $value1*$value2*230 . " kroner"; 
}


//Hvis bensinforbruk er valgt, gang value1(dynamisk) med value3(fra database)
if($forbruk=="Bensinforbruk"){
echo "<b>Du bruker bensin for verdi:</b><br>";
echo $value1*$value3 . " kroner"; 
}


if($forbruk=="Bensinforbruk"){
echo "<br><b>I en arbeidsuke blir dette:</b><br>";
echo $value1*$value3*5 . " kroner"; 
}

if($forbruk=="Bensinforbruk"){
echo "<br><b>I et arbeidsår (230 dager) blir dette:</b><br>";
echo $value1*$value3*230 . " kroner"; 
}

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