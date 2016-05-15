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

<form action="graphs.php?action=papercup" method="POST">
			<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>
			<tr><td colspan=3>Forbruk Engangsartikler - Pappkrus</td></tr>
			<tr>
			<td>Hvor mange pappkrus bruker du per dag?</td><td><input type="int" size="35%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr></div>
			</table>
			</form>
			
<?php if(@$_GET['action'] == "papercup")
{
$number= intval($_POST['number']);
echo '<img src="graphs/papercup.php?n='.$number.'"/>';
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
echo '<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>';
echo '<tr><td>'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td>'.nl2br ($tekst).'</td></tr>';
echo '</table>';
}
?>

<br/><br/><br/><br/><br/><br/>
<br><br><br/><br/>

<form action="graphs.php?action=paper" method="POST">
			<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>
			<tr><td colspan=3>Forbruk Engangsartikler - Kopipapir</td></tr>
			<tr>
			<td>Hvor mange Kopipapir bruker du til dagen?</td><td><input type="int" size="35%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr></div>
			</table>
			</form>
 <?php if(@$_GET['action'] == "paper")
{
$number= intval($_POST['number']);
echo '<img src="graphs/paper.php?n='.$number.'"/>';
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
echo '<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>';
echo '<tr><td>'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td>'.nl2br ($tekst).'</td></tr>';
echo '</table>';
}
?>   
<br/><br/><br/><br/><br/><br/>
<br><br><br/><br/>





<form action="graphs.php?action=transport" method="POST">
			<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>
			<tr><td colspan=3>Transport - Kilometer reist i tjenestetid</td></tr>
			<tr>
			<td>Hvor mange Kilometer kjører du i snitt per dag i tjeneste?</td><td><input type="int" size="35%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr></div>
			</table>
			</form>
 <?php if(@$_GET['action'] == "transport")
{
$number= intval($_POST['number']);
echo '<img src="graphs/transport.php?n='.$number.'"/>';
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
echo '<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>';
echo '<tr><td>'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td>'.nl2br ($tekst).'</td></tr>';
echo '</table>';
}
?> 
<br/><br/><br/><br/><br/><br/>
<br><br><br/><br/>

<form action="graphs.php?action=energi" method="POST">
			<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>
			<tr><td colspan=3>Energi - Energiforbruk ditt areal</td></tr>
			<tr>
			<td>Hvor stort arbeidsareal disponerer du/din enhet idag?</td><td><input type="int" size="35%" name="number"></td>
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
 <?php if(@$_GET['action'] == "energi")
{
$number= intval($_POST['number']);
$hospital=$_POST['sykehus'];
echo '<img src="graphs/energi_'.$hospital.'.php?n='.$number.'"/>';
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
echo '<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>';
echo '<tr><td>'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td>'.nl2br ($tekst).'</td></tr>';
echo '</table>';
}
?> 
<br/><br/><br/><br/><br/><br/>
<br><br><br/><br/>
<form action="graphs.php?action=energi_lokasjon" method="POST">
			<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>
			<tr><td colspan=3>Energi - Energiforbruk per lokasjon</td></tr>
			<td>Sammenlign Energiforbruk ved sykehusene</td><td>
					<input type="radio" value="kontor" name="lokasjon">Gjennomsnittskontor<br>
					<input type="radio" value="avdeling" name="lokasjon">Gjennomsnittsavdeling<br>
					</td>
			<tr>
			<td><input type="submit" name="submit" value="Se diagram"></td>
			</tr></div>
			</table>
			</form>
 <?php if(@$_GET['action'] == "energi_lokasjon")
{
	$lokasjon=$_POST['lokasjon'];
echo '<img src="graphs/energi_'.$lokasjon.'.php"/>';
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
echo '<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>';
echo '<tr><td>'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td>'.nl2br ($tekst).'</td></tr>';
echo '</table>';
}
?> 
   
 </div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>