<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

?>
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
<title>Søylediagrammer</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
<script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/forms.js"></script> 
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
<br>
<br>
<center>
<h4>Ekko tekst</h3>
</center>
<div class="grid_13">

<form action="graphs.php?action=papercup" method="POST">
			<table width="350px" bgcolor=#d0d7e9>
			<th colspan=3>Forbruk Engangsartikler - Pappkrus</th>
			<tr>
			<td width="60%">Hvor mange pappkrus bruker du per dag?</td>
			<td><input type="int" size="20%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr></div>
			</table>
			</form>
			
<br>
<form action="graphs.php?action=paper" method="POST">
			<table width="350px" bgcolor=#d0d7e9>
			<th colspan=3>Forbruk Engangsartikler - Kopipapir</th>
			<tr>
			<td width="60%">Hvor mange Kopipapir bruker du til dagen?</td><td><input type="int" size="20%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr></div>
			</table>
			</form>

<br>

<form action="graphs.php?action=transport" method="POST">
			<table width="350px" bgcolor=#d0d7e9>
			<tr><td colspan=3>Transport - Kilometer reist i tjenestetid</td></tr>
			<tr>
			<td width="60%">Hvor mange Kilometer kjører du i snitt per dag i tjeneste?</td><td><input type="int" size="20%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr></div>
			</table>
			</form>

<br>
<form action="graphs.php?action=energi" method="POST">
			<table width="350x" bgcolor=#d0d7e9>
			<tr><td colspan=3>Energi - Energiforbruk ditt areal</td></tr>
			<tr>
			<td width="60%">Hvor stort arbeidsareal disponerer du/din enhet idag?</td><td><input type="int" size="20%" name="number"></td>
			</tr>
			<tr>
			<td>Hvilket sykehus er du ansatt ved?</td><td>
					<input type="radio" value="kristiansand" name="sykehus">Kristiansand<br>
					<input type="radio" value="flekkefjord" name="sykehus">Flekkefjord<br>
					<input type="radio" value="arendal" name="sykehus">Arendal<br>
					</td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr></div>
			</table>
			</form>
<br>
<form action="graphs.php?action=energi_lokasjon" method="POST">
			<table width="350px" bgcolor=#d0d7e9>
			<tr><td colspan=3>Energi - Energiforbruk per lokasjon</td></tr>
			<td width="48%">Sammenlign Energiforbruk ved sykehusene</td><td>
					<input type="radio" value="kontor" name="lokasjon">Gjennomsnittskontor<br>
					<input type="radio" value="avdeling" name="lokasjon">Gjennomsnittsavdeling<br>
					</td>
			<tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr>
			</tr></div>
			</table>
			</form>

<br>

   </div>
   <div class="grid_11";>
 
   <?php if(@$_GET['action'] == "papercup")
{
$number= intval($_POST['number']);
echo '<img style="border:1px solid black" src="graphs/papercup.php?n='.$number.'" />';
if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM funfacts
		WHERE plassering = 'pappkrus'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($overskrift, $tekst);
        $stmt->fetch();
		}
echo '<table <div border=0 bgcolor=#d0d7e9 style="margin-left: 15px; float: right">';
echo '<tr><td width="230px">'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td width="230px">'.nl2br ($tekst).'</td></tr>';
echo '</table>';
}
?>

<?php if(@$_GET['action'] == "paper")
{
$number= intval($_POST['number']);
echo '<img style="border:1px solid black" src="graphs/paper.php?n='.$number.'"/>';
if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM funfacts
		WHERE plassering = 'kopipapir'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($overskrift, $tekst);
        $stmt->fetch();
		}
echo '<table <div border=0 bgcolor=#d0d7e9 style="margin-left: 15px; float: right">';
echo '<tr><td width="230px">'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td width="230px">'.nl2br ($tekst).'</td></tr>';
echo '</table>';
}
?>   

 <?php if(@$_GET['action'] == "transport")
{
$number= intval($_POST['number']);
echo '<img style="border:1px solid black" src="graphs/transport.php?n='.$number.'"/>';
if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM funfacts
		WHERE plassering = 'transport'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($overskrift, $tekst);
        $stmt->fetch();
		}
echo '<table <div border=0 bgcolor=#d0d7e9 style="margin-left: 15px; float: right">';
echo '<tr><td width="230px">'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td width="230px">'.nl2br ($tekst).'</td></tr>';
echo '</table>';
}
?> 

 <?php if(@$_GET['action'] == "energi")
{
$number= intval($_POST['number']);
$hospital=$_POST['sykehus'];
echo '<img style="border:1px solid black" src="graphs/energi_'.$hospital.'.php?n='.$number.'"/>';
if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM funfacts
		WHERE plassering = 'ditt_areal'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($overskrift, $tekst);
        $stmt->fetch();
		}
echo '<table <div border=0 bgcolor=#d0d7e9 style="margin-left: 15px; float: right">';
echo '<tr><td width="230px">'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td width="230px">'.nl2br ($tekst).'</td></tr>';
echo '</table>';
}
?> 

 <?php if(@$_GET['action'] == "energi_lokasjon")
{
	$lokasjon=$_POST['lokasjon'];
echo '<img style="border:1px solid black; position: relative; float:left;" src="graphs/energi_'.$lokasjon.'.php"/>';
if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM funfacts
		WHERE plassering = 'sykehusene'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($overskrift, $tekst);
        $stmt->fetch();
		}

echo '<table <div border=0 bgcolor=#d0d7e9 style="margin-left: 15px; margin-top: 670px; clear: left">';
echo '<tr><td width="400px">'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td width="400px">'.nl2br ($tekst).'</td></tr>';
echo '</table>';
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