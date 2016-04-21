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
  <div class="grid_7 prefix_1">
  <div class="grid_10">
  <div style="background-color:#f2f2f2;">
  <div style="font-family: helvetica">
	
	
<text><font color="#666362"><br><br><center><h5>Forbrukskalkulator</h5></br>Her kan du få en liten oversikt over dine egne miljøvaner på sykehuset. <br>Skriv inn verdier i tekstfeltet og velg kategori for å regne ut ditt forbruk!</center></text>

<text><br><center>Hvor mange engangsglass bruker du per dag?</text>
<text><br>Hvor mange kilometer kjører du per dag?</center></text>
<br>
<center>
<form method='post'>
<div class="inputHolder">

<label>
Kategori:
</label>
<select name='forbruk' class="calcInput2">
	<option value2="Engangsglass">Engangsglass</option>
	<option value3="Bensinforbruk">Bensinforbruk</option>
</select>
</div>
</br>
</br>
</br>
<div class="inputHolder">

<label>
Verdi:
</label>
<input type='text' name='value1' class="calcInput">
</div>
</br>
</br>
</br>
<input type="button" name='submit' value='Kalkulèr' class="buttonKalkuler">
</form>
</center>
</font>

<center>
<textarea rows="10" cols="50" placeholder=".....">
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
echo "Du bruker engangsglass for verdi: ";
echo $value1*$value2 . " kroner"; 
}


if($forbruk=="Engangsglass"){
echo "				I en arbeidsuke blir dette: ";
echo $value1*$value2*5 . " kroner"; 
}

if($forbruk=="Engangsglass"){
echo "				I et arbeidsår (230 dager) blir dette: ";
echo $value1*$value2*230 . " kroner"; 

echo "
				
Husk at disse verdiene blir ganget med tusenvis av andre ansatte! ";
}


//Hvis bensinforbruk er valgt, gang value1(dynamisk) med value3(fra database)
if($forbruk=="Bensinforbruk"){
echo "Du bruker bensin for verdi: ";
echo $value1*$value3 . " kroner"; 
}


if($forbruk=="Bensinforbruk"){
echo "			I en arbeidsuke blir dette: ";
echo $value1*$value3*5 . " kroner"; 
}

if($forbruk=="Bensinforbruk"){
echo "			I et arbeidsår (230 dager) blir dette: ";
echo $value1*$value3*230 . " kroner"; 

echo "
				
Husk at disse verdiene blir ganget med alle andre som kjører arbeidsbiler på Sykehuset! ";
}

}

?>
</textarea></center>
</div>
</div>
</div>
</div>
</div>
</section>
	<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>