<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<title>Milj�kalkulatoren</title>

</head>
<body>
<text>Hvor mange engangsglass bruker du per dag?</text>
<form method='post' action='calculator.php'>
<input type='text' name='value1'>
 
<select name='value2'>
<option>Engangsglass</option>
<option>Kilometer kj�rt (Bensinforbruk)</option>


</select>



<input type='submit' name='submit' value='Kalkuler'></form>

<?php
//Input integer in value1, static value2, 
if(isset($_POST['submit'])){
$value1 = $_POST['value1'];
$value2 = "5";


//Hvis ganger-tegnet er valgt, s� ganger value1(dynamisk) med value2(statisk)
{
echo "<b>Du bruker engangsglass for verdi:</b><br>";
echo $value1*$value2 . " kroner"; 
}

{
echo "<br><b>I en arbeidsuke blir dette:</b><br>";
echo $value1*$value2*5 . " kroner"; 
}

{
echo "<br><b>I et arbeids�r (230 dager) blir dette:</b><br>";
echo $value1*$value2*230 . " kroner"; 
}

}

?>

</body>
</html>