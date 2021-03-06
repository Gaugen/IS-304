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
    <?php
	//updates text displayed on the page
	if(isset($_POST['update'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE tekstbokser SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'Graphs'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
	//gets text from DB to be displayed on the page
	if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM tekstbokser
		WHERE plassering = 'Graphs'
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

<br>

<center>
<br>
<!-- Give the admin if logged in the possibility to change text displayed on the page -->
<?php if (login_check($mysqli) == true) {?>
<br>
<form action="graphs.php" method="POST">
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
<?php }
	  else{?>
	  <br>
	  <h2 class="inset__1"><?php echo nl2br ($overskrift); ?></h2>
	  <p><font size="4"><?php echo nl2br ($tekst); ?></p></font>
	  <div class="grid_8 alpha">
	<?php }?>
</center>
<div class="grid_13">
<!-- Here comes forms that sends input or no input and uses the files in the graph folder to generate pictures/diagrams displayed together with funfacts -->
<form action="graphs.php?action=papercup" method="POST">
			<table width="355px" bgcolor=#d0d7e9>
			<th colspan=3>Forbruk Engangsartikler - Pappkrus</th>
			<tr>
			<td width="60%">Hvor mange pappkrus bruker du per dag?</td>
			<td><input type="int" size="20%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr>
			</table>
			</form>
			
<br>
<form action="graphs.php?action=paper" method="POST">
			<table width="355px" bgcolor=#d0d7e9>
			<th colspan=3>Forbruk Engangsartikler - Kopipapir</th>
			<tr>
			<td width="60%">Hvor mange Kopipapir bruker du til dagen?</td><td><input type="int" size="20%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr>
			</table>
			</form>

<br>

<form action="graphs.php?action=transport" method="POST">
			<table width="355px" bgcolor=#d0d7e9>
			<th colspan=3>Transport - Kilometer reist i tjenestetid</th>
			<tr>
			<td width="60%">Hvor mange Kilometer kjører du i snitt per dag i tjeneste?</td><td><input type="number" step="0.1" size="20%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr>
			</table>
			</form>

<br>
<form action="graphs.php?action=energi" method="POST">
			<table width="355px" bgcolor=#d0d7e9>
			<th colspan=3>Energi - Energiforbruk ditt areal</th>
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
			</tr>
			</table>
			</form>
<br>
<form action="graphs.php?action=energi_lokasjon" method="POST">
			<table width="355px" bgcolor=#d0d7e9>
			<tr><td colspan=3>Energi - Energiforbruk per lokasjon</td></tr>
			<td width="48%">Sammenlign Energiforbruk ved sykehusene</td><td>
					<input type="radio" value="kontor" name="lokasjon">Gjennomsnittskontor<br>
					<input type="radio" value="avdeling" name="lokasjon">Gjennomsnittsavdeling<br>
					</td>
			<tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se diagram"></td>
			</tr>
			</tr>
			</table>
			</form>

<br>

   </div>
   <!--This code gets funfact info and also sends number to be displayed on the graph generated-->
 
   <?php if(@$_GET['action'] == "papercup")
{
$number= $_POST['number'];
echo '<div class="grid_11";>';
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
echo '</div>';
}
?>

<?php if(@$_GET['action'] == "paper")
{
$number= $_POST['number'];
echo '<div class="grid_11";>';
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
echo '</div>';
}
?>   

 <?php if(@$_GET['action'] == "transport")
{
$number= $_POST['number'];
echo '<div class="grid_11";>';
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
echo '</div>';
}
?> 

 <?php if(@$_GET['action'] == "energi")
{
$number= $_POST['number'];
$hospital=$_POST['sykehus'];
echo '<div class="grid_11";>';
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
echo '</div>';
}
?> 
<!--</div>-->

 <?php if(@$_GET['action'] == "energi_lokasjon")
{
	$lokasjon=$_POST['lokasjon'];
echo ' <div class="grid_16">';
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

echo '<table <div border=0 bgcolor=#d0d7e9  clear: left">';
echo '<tr><td width="745px">'.nl2br ($overskrift).'</td></tr>';
echo '<tr><td width="400px">'.nl2br ($tekst).'</td></tr>';
echo '</table>';
echo '</div>';
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