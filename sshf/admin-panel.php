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
<title>Dokumenter</title>
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
  <div class="grid_11">
  <br>
  <br>

	<article class="tabs">

	<section id="tab1">
		<h2><a href="#tab1">Kalkulator</a></h2>
		<text>Her kan du legge inn ny verdi for engangsglass</text> 
<form method='post' name='engangsglass'> 
<input type='int' name='value2'>
<input type='submit' name='engangsglass' value='Legg til verdi'></form>
<br></br>

<text>Her kan du legge inn ny verdi for bensinpris pr km</text><br></br>
<form method='post' name='bensinforbruk'>
<input type='int' name='value3'>
<input type='submit' name='bensinforbruk' value='Legg til verdi'></form>
<br></br>

<?php 
// Oppdater verdien i engangsglass i calculator-tabellen
if(isset($_POST['engangsglass'])){
	$q = "UPDATE calculator SET engangsglass='$_POST[value2]'";
	mysqli_query($mysqli, $q);
}

	
// Oppdater verdien i bensinforbruk i calculator-tabellen	
if(isset($_POST['bensinforbruk'])){
	$r = "UPDATE calculator SET bensinforbruk='$_POST[value3]'";
	mysqli_query($mysqli, $r);
}

?>

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
		
	</section>
	<section id="tab2">
		<h2><a href="#tab2">Filbehandler</a></h2>
		<form action="files/upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">Last opp</button>
	</form>
    <br /><br />
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>Data opplastet...  </label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Det oppstod et problem under opplasting !</label>
        <?php
	}
	else
	{
		?>
        <label>Trykk velg fil for å laste opp excel-ark</label>
        <?php
	}
	
	?>
	
<table width="90%" border="1">
    
  
	 
    <?php
	//echo "<div class=fileTable>";
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($mysqli, $sql);
	//$stmt = $mysqli->prepare($sql);
	//$stmt->execute();
	//$stmt->store_result($data);
	
			echo "<table width=100% border='1' cellpadding='10'>";
	echo '<th width="40%">Filnavn</th> <th width="15%">Filtype</th> <th width="15%">Filstørrelse (KB)</th> <th width="5%">ID</th> <th width="6%">Last ned</th> <th width="4%">Slett</th>';
	
	
	while($row=mysqli_fetch_array($result_set)){
		echo "<table width=100% border='1' cellpadding='10'>";
	
	

	
		echo "<tr>";
		echo '<td width="40%">' . $row['file'] . '</td>';
		echo '<td width="15%">' . $row['type'] . '</td>';
		echo '<td width="15%">' . $row['size'] . '</td>';
		echo '<td width="5%">' . $row['id'] . '</td>';
		
		echo '<td width="6%"><a href="files/download.php?id=' . $row['id'] . '"><button>Last Ned</button></a></td>';
					
		echo '<td width="3%"><a href="files/delete.php?id=' . $row['id'] . '"><button>Slett</button></a></td>';	
	
		
		echo "</tr>"; 
		
		// close table>
		echo "</table>";
	}
		//echo "</div>";
		?>
	</section>
	
	<section id="tab3">
		<h2><a href="#tab3">Nyheter</a></h2>
		<form enctype="multipart/form-data" action="storeinfo.php" method="POST">
		<table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
		<tr><td colspan=3>Nyheter</td></tr>
		<tr>
		<td>Tema</td><td><input type=text size="35%" name="newstopic"></td>
		</tr>
		<tr>
		<td>Informasjon</td><td><textarea name="newsinfo" id="newsinfo" rows="10" cols="60"></textarea></td>
		</tr>
		<tr>
		<td>Bilde</td><td><input type=file name="newsphoto"></td>
		</tr>
		<tr>
		<td></td><td><input type=submit name="submit" value="Post"></td>
		</tr>
		</table>
		</form>
		<?php


if (isset($_POST['delete'])){
	$DeleteQuery = "DELETE FROM post WHERE newstopic='$_POST[hidden]'";
	mysqli_query($mysqli, $DeleteQuery);
	?>
		<script>
		alert('successfully deleted');
        window.location.href='admin-panel.php#tab3';
        </script>
		<?php
};

echo "<div class=newsekko>";

$q = "SELECT * FROM post ORDER BY newsno DESC";
$r = mysqli_query($mysqli, "$q");
if($r)
{
while($row=mysqli_fetch_array($r)){
	echo "<form action=admin-panel.php method=post>";
	echo "<div class=container>";
	echo "<div class=newsheader>";
	echo "<h7>";
	echo $row['newstopic'];
	echo "</h7>";
	echo "</div>";
	echo "<img src=image.php?newsno=".$row['newsno']." width=184 height=185/>";
	echo "<div class=tb2>";
	echo $row['newsinfo'];
	echo "</div>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $row['newstopic'] . " </td>";
	echo "<div class=newsfooter>";
	echo "<td>" .  "<input type=submit name=delete value=Delete>" . "</td>";
	echo "</div>";
	echo "</br>";
	echo "</br>";
	echo "</form>";
	echo "</div>";
}


}

else
{
echo mysqli_error($mysqli);
}
echo "</div>";
?>
	</section>

</article>
     <div class="clear"></div>
</div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>