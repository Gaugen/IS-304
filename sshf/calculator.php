<!DOCTYPE html>
<html lang="en">
<head>
<title>Miljøkalkulator</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />





</head>
<body>
<text>Hvor mange engangsglass bruker du per dag?</text>
<text><br>Hvor mange kilometer kjører du per dag?</text>

<form method='post' action='calculator.php'>
<input type='text' name='value1'>
 
<select name='forbruk'>
<option value2="Engangsglass">Engangsglass</option>
<option value3="Bensinforbruk">Bensinforbruk</option>


</select>



<input type='submit' name='submit' value='Kalkuler'></form>

<?php
//Input integer/tall i value1, static value2,3 
if(isset($_POST['submit'])){
$value1 = $_POST['value1'];
$forbruk = $_POST['forbruk'];
$value2 = "1";
$value3 = "1.16";


//Hvis engangsglass er valgt, gang value1(dynamisk) med value2(statisk)
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

//Hvis bensinforbuk er valgt, gang value1(dynamisk) med value3(statisk)
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

</body>
</html>

