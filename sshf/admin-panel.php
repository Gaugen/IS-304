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
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
<title>Dokumenter</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
<script type="text/JavaScript" src="js/forms.js"></script>
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
	
<?php
//checks if admin is logged in
 if (login_check($mysqli) == true) : 
 ?>
	<article class="tabs">
<!-- Tab 1 is a written guide that explains what the admin can do in the admin panel -->
		<section id="tab1">
			<h2><a href="#tab1">Guide</a></h2>
			<font size="5"><p style="font-weight:bold;">Brukerguide for Admin-panelet.</P> </font>
	
			<font size="4"><p style="font-weight:bold;"> Hva kan en administrator gjøre?  </p> </font> 
			<p> En administrator kan legge til nye admin-brukere, laste opp filer, poste nyheter og bilder, samt legge inn grafdata til grafene. </p> 
			<font size="4"><p style="font-weight:bold;"> Laste opp filer og dokumenter </p> </font> 
			<p> I "filbehandler"-fanen kan du som administrator gå inn og laste opp filer. Dette gjør man ved å trykke på "velg fil",
			derretter velger man en fil fra sin datamaskin som man vil laste opp, så trykker man på "last opp" knappen. Denne filen vil nå være tilgjengelig for nedlastning av 
			brukerne på "dokumenter" som ligger i menyen. Man kan se filnavn-, type, størrelse og ID som Admininistrator. Administrator har også muligheten til å slette opplastede filer herfra.</p> 
			<font size="4"><p style="font-weight:bold;"> Poste Nyheter/Informasjon </p> </font>
			<p> En administrator har muligheten til å poste nyheter/informasjon på "nyheter"-fanen. Når man kommer inn her ser man utfyllingsfelt til venstre
			hvor man kan skrive inn tema, nyhet/informasjon, laste opp bilde, velge kategori og derretter poste. "Tema" og "Informasjon" er enkle tekst-felt hvor 
			man skriver inn ønsket tekst, på "Bilde" laster man opp ønsket bilde ved å trykke på "velg fil" og derretter velger et bilde fra datamaskinen. På "Kategori" 
			velger man hvilken kategori postene skal gå inn under, og til slutt publiserer man nyheter ved "post" knappen. Når man har gjort dette, kommer 
			posten på siden av utfyllingsfeltene, slik at Administrator kan se om det ser greit ut, i tillegg kommer posten på fremsiden, og på kategori-sidene nyheten tilhører. For eksempel hvis du skriver en nyhet i Energi-kategorien kommer nyheten på Energi-siden i tillegg til forsiden.</p> 
			<font size="4"><p style="font-weight:bold;"> Skifte navn på meny/footer </p> </font>
            <p> En administrator kan skifte navn på menyen og footeren, f.eks om "Om Miljøsertifisering" skulle endre navn på sykehuset, kan Admininistrator gå
            inn i "Admin-panel", trykke på fanen "NavnEndring" og derretter finne "Om Miljøsertifisering", og trykke "rediger teksten".</p>
            <font size="4"><p style="font-weight:bold;"> Legge inn Grafdata </p> </font>
            <p> En Admininistrator kan legge inn data til grafene som brukerene av siden skal ta i bruk. For å gjøre dette går man i "admin-panel", og deretter fanen "Søylediagrammer",
                Her kan man da plotte inn riktig tall og tekst til ønsket graf og trykke på "Oppdater"</p>
		</section>
		<!-- In tab 2 the admin can manag files and reports -->
		<section id="tab2">
			<h2><a href="#tab2">Filbehandler</a></h2>
			<label>Trykk velg fil for å laste opp fil - legg så til en beskrivelse. <br>Filen publiseres når du trykker last opp</label>
			<form action="files/upload.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file" />
			
			
			
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
			
				<?php
			}
			?>
		
			
			<table <div style="border=0 align="center" bgcolor=#d0d7e9>
			<tr>
			<td>Beskrivelse</td><td><textarea name="beskrivelse" id="beskrivelse" rows="5" cols="30"></textarea></td>
			</tr>
			</div>
			</table>
			<button type="submit" name="btn-upload">Last opp</button>
			</form>
			<br><br>
			<table width="90%" border="1">
			<?php
			//Gets files with informaion from DB and displays the so the admin can manage them
			$sql="SELECT * FROM tbl_uploads ORDER BY id DESC";
			$result_set=mysqli_query($mysqli, $sql);
			
					echo "<table width=100% border='1' cellpadding='10'>";
			echo '<th width="30%">Beskrivelse</th><th width="20%">Filnavn</th> <th width="15%">Filtype</th> <th width="5%">Size</th> <th width="5%">ID</th> <th width="6%">Last ned</th> <th width="4%">Slett</th>';
			
			
			while($row=mysqli_fetch_array($result_set)){
				echo "<table width=100% border='1' cellpadding='10'>";
				echo "<tr>";
				echo '<td width="30%">' . $row['beskrivelse'] . '</td>';
				echo '<td width="20%">' . $row['file'] . '</td>';
				echo '<td width="15%">' . $row['type'] . '</td>';
				echo '<td width="5%">' . $row['size'] . '</td>';
				echo '<td width="5%">' . $row['id'] . '</td>';
				echo '<td width="6%"><a href="files/download.php?id=' . $row['id'] . '"><button>Last Ned</button></a></td>';			
				echo '<td width="3%"><a href="files/delete.php?id=' . $row['id'] . '"><button>Slett</button></a></td>';	
				echo "</tr>"; 

				echo "</table>";
			}

				?>
		</section>
	<!-- In tab 3 the admin can create posts and decide where they should be placed -->
		<section id="tab3">
			<h2><a href="#tab3">Nyheter</a></h2>
			<form enctype="multipart/form-data" action="storeinfo.php" method="POST">
			<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>
			<tr><td colspan=3>Nyheter</td></tr>
			<tr>
			<td>Tema</td><td><input type="text" size="35%" name="newstopic"></td>
			</tr>
			<tr>
			<td>Informasjon</td><td><textarea name="newsinfo" id="newsinfo" rows="10" cols="60"></textarea></td>
			</tr>
			<tr>
			<td>Bilde</td><td><input type="file" name="newsphoto"></td>
			</tr>
			<tr>
			<td>Kategori</td><td>
					<input type="radio" value="news.php" name="kategori">Generell<br>
					<input type="radio" value="transport.php" name="kategori">Transport<br>
					<input type="radio" value="energi.php" name="kategori">Energi<br>
					<input type="radio" value="avfall.php" name="kategori">Avfall<br>
					<input type="radio" value="disposables.php" name="kategori">Engangs<br>
					</td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Post"></td>
			</tr>
			</table>
			</form>
			<?php

			// if admin deletes a post this function deletes it from DB
			if (isset($_POST['delete'])){
				$DeleteQuery = "DELETE FROM post WHERE newsno='$_POST[newsno]'";
				mysqli_query($mysqli, $DeleteQuery);
				?>
					<script>
					window.location.href='admin-panel.php#tab3';
					</script>
					<?php
			};
			echo "<div class=newsekko>";
			//gets all news posts from DB and displays them
			$q = "SELECT * FROM post WHERE newsno <> '1' ORDER BY newsno DESC";
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
				echo nl2br ($row['newsinfo']);
				echo "</br>";
				echo "</div>";
				echo "<td>" . "<input type=hidden name=newsno value=" . $row['newsno'] . " </td>";
				echo "<div class=newsfooter>";
				echo 'Kategori: ' .	$row['kategori']; 
				echo "<div style='float: right;'>";
				echo "<td>" .  "<input type=submit name=delete value=Slett>" . "</td>";
				echo "</div>";
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
		<!-- In tab 5 the admin can set the email that useres send email to through the mail form on the contact page -->
		<section id="tab5">
		<?php
		if ($stmt = $mysqli->prepare("SELECT email FROM active_mail WHERE id = 1
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($active_mail);
        $stmt->fetch();} 
		?>
			<h2><a href="#tab5">Aktiv Email</a></h2>
			<form action="editmail.php" method="POST">
			<center>
			<table <div class=containerpost2 border=0 align=center bgcolor=#d0d7e9>
			<tr><td colspan=3>Skriv inn email-adresse som du vil henvendelser fra brukere skal bli sendt til.</td></tr>
			<tr><td colspan=3>Aktiv Email-Adresse nå er: <?php echo $active_mail;?></td></tr>
			<tr>
			<td>Email-Adresse:</td><td><input type=text size="29%" name="new_mail" id="new_mail" onkeyup='checkmail()'></td>
			</tr>
			<tr>
			<td>Gjenta Email-Adresse:</td><td><input type=text size="29%" name="confirm_mail" id="confirm_mail" onkeyup='checkmail()'></td>
			<tr><td>&nbsp;</td><td><span id='message1'></span></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="change_mail" value="Bytt Email"></td>
			</tr>
			</table>
			</center>
			</form>
		</section>
		<!-- In tab 6 the admin can change the names displayed in the main menue -->
		<section id="tab6">
			<h2><a href="#tab6">NavnEndring</a></h2>
			<center><h4>Endre navnene på menyvalgene og footer informasjonen</h1></center>
			<!-- Menu1  -->
			<div class="grid_3" style="border:1px solid black; margin-left: 200px; background-color: #d0d7e9;">
			<center><h5 style="text-decoration: underline;">Venstre meny</h5></center>
			<br>
			<?php
	
	if(isset($_POST['update1'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu1'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu1'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu1);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
      <form action="admin-panel.php#tab6" method="POST">
	  <?php echo nl2br ($menu1); ?>
	  <br>
<div class="dropdownIndex">
<submit onclick="myIndexFunction()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Meny1</td><td><input type=text size="35%" name="menufootertopic" value="<?php echo     $menu1;?>"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update1" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
			

	  <?php } ?>
	  <br><br>
	  
	  <!-- Menu2  -->
			
			<?php
	
	if(isset($_POST['update2'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu2'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu2'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu2);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
      <form action="admin-panel.php#tab6" method="POST">
	  <?php echo nl2br ($menu2); ?>
	  <br>
<div class="dropdownIndex">
<submit onclick="myIndexFunction2()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex2" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Meny2</td><td><input type=text size="35%" name="menufootertopic" value="<?php echo     $menu2;?>"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update2" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
			

	  <?php } ?>
	  <br><br>
	  	  <!-- Menu3  -->
			
			<?php
	
	if(isset($_POST['update3'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu3'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu3'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu3);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
      <form action="admin-panel.php#tab6" method="POST">
	  <?php echo nl2br ($menu3); ?>
	  <br>
<div class="dropdownIndex">
<submit onclick="myIndexFunction3()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex3" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Meny3</td><td><input type=text size="35%" name="menufootertopic" value="<?php echo     $menu3;?>"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update3" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
			

	  <?php } ?>
	  <br><br>
	  
	  <!-- Menu8  -->
			<?php
	
	if(isset($_POST['update8'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu8'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu8'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu8);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
      <form action="admin-panel.php#tab6" method="POST">
	  <?php echo nl2br ($menu8); ?>
	  <br>
<div class="dropdownIndex">
<submit onclick="myIndexFunction10()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex10" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Meny8</td><td><input type=text size="35%" name="menufootertopic" value="<?php echo     $menu8;?>"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update8" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
			

	  <?php } ?>
	  <br><br>
	  
	  
	   <!-- menu4 -->
	   </div>
	  <div class="grid_3" style="border:1px solid black;  background-color: #d0d7e9;">
	  <center><h5 style="text-decoration: underline;">Høyre meny</h5></center>
	  <br>
	  <?php
	
	if(isset($_POST['update4'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu4'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu4'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu4);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
      <form action="admin-panel.php#tab6" method="POST">
	  <?php echo nl2br ($menu4); ?>
	  <br>
<div class="dropdownIndex">
<submit onclick="myIndexFunction4()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex4" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Meny4</td><td><input type=text size="35%" name="menufootertopic" value="<?php echo     $menu4;?>"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update4" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
			

	  <?php } ?>
	  <br><br>
	   <!-- menu6 -->
	  
	  <?php
	
	if(isset($_POST['update6'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu6'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu6'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu6);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
      <form action="admin-panel.php#tab6" method="POST">
	  <?php echo nl2br ($menu6); ?>
	  <br>
<div class="dropdownIndex">
<submit onclick="myIndexFunction6()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex6" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Meny6</td><td><input type=text size="35%" name="menufootertopic" value="<?php echo     $menu6;?>"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update6" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
			

	  <?php } ?>
	  <br><br>
	  <!-- menu7 -->
	   <?php
	
	if(isset($_POST['update7'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu7'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu7'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu7);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
      <form action="admin-panel.php#tab6" method="POST">
	  <?php echo nl2br ($menu7); ?>
	  <br>
<div class="dropdownIndex">
<submit onclick="myIndexFunction7()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex7" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Meny7</td><td><input type=text size="35%" name="menufootertopic" value="<?php echo     $menu7;?>"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update7" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
			

	  <?php } ?>
	  <br><br>
	  </div> 
	  
	  <!-- footer1 -->
	  <div class="grid_3" style="border:1px solid black;  background-color: #d0d7e9;">
	  <center><h5 style="text-decoration: underline;">Footer</h5></center>
	  <br>
	   <?php
	
	if(isset($_POST['Footer1'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Footer1'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Footer1'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($footer1);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
      <form action="admin-panel.php#tab6" method="POST">
	  <?php echo nl2br ($footer1); ?>
	  <br>
<div class="dropdownIndex">
<submit onclick="myIndexFunction8()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex8" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Footer1</td><td><textarea name="menufootertopic" rows="2" cols="60"><?php echo     $footer1;?></textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="Footer1" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
			

	  <?php } ?>
	  <br><br>
	  <!-- footer2 -->
	   <?php
	
	if(isset($_POST['update9'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Footer2'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Footer2'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($footer2);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
      <form action="admin-panel.php#tab6" method="POST">
	  <?php echo nl2br ($footer2); ?>
	  <br>
<div class="dropdownIndex">
<submit onclick="myIndexFunction9()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex9" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Footer2</td><td><input type=text size="35%" name="menufootertopic" value="<?php echo     $footer2;?>"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update9" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
			

	  <?php } ?>
	  <br><br>
	  </div>
	  
	  
	  
		</section>
		<!-- In tab 7 the admin can update the values, legend and funfacts used and displayed on the statistic page -->
<section id="tab7">
			<?php 
			//Updates value used in the graphs 
			if(isset($_POST['pappkrus_avrg'])){
				$q = "UPDATE graphs SET papercup_avrg=$_POST[papp_avrg]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['pappkrus_mål'])){
				$q = "UPDATE graphs SET papercup_wish=$_POST[papp_mål]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['kopipapir_avrg'])){
				$q = "UPDATE graphs SET paper_avrg=$_POST[papir_avrg]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['kopipapir_mål'])){
				$q = "UPDATE graphs SET paper_wish=$_POST[papir_mål]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['kjørelengde_avrg'])){
				$q = "UPDATE graphs SET transport_avrg=$_POST[kjøre_avrg]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['kjørelengde_mål'])){
				$q = "UPDATE graphs SET transport_wish=$_POST[kjøre_mål]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['kristiansand'])){
				$q = "UPDATE graphs SET energi_kristiansand=$_POST[energi]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['flekkefjord'])){
				$q = "UPDATE graphs SET energi_flekkefjord=$_POST[energi]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['arendal'])){
				$q = "UPDATE graphs SET energi_arendal=$_POST[energi]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['sshf'])){
				$q = "UPDATE graphs SET energi_sshf_avrg=$_POST[energi]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['normalforbruk'])){
				$q = "UPDATE graphs SET energi_normalforbruk=$_POST[energi]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['kontor'])){
				$q = "UPDATE graphs SET areal_kontor=$_POST[energi]";
				mysqli_query($mysqli, $q);
			}
			if(isset($_POST['avdeling'])){
				$q = "UPDATE graphs SET areal_avdeling=$_POST[energi]";
				mysqli_query($mysqli, $q);
			}
?>
<?php
// Gets the value used in the graphs from DB
if ($stmt =$mysqli->prepare("SELECT *
        FROM graphs
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($papercup_avrg,$papercup_wish,$paper_avrg,$paper_wish,$transport_avrg,$transport_wish,$energi_kristiansand,$energi_flekkefjord,$energi_arendal,$energi_sshf_avrg,$energi_normalforbruk,$areal_kontor,$areal_avdeling);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
?>
<!--displayes used values in graphs and gives the possibility to change them -->
			<h2><a href="#tab7">Søylediagrammer</a></h2>
			<div class="newsekko1">
			<div style="font-family: helvetica">
			<center><br> <br>
			<p><font size="5">Her kan du stille verdiene som blir brukt i de forskjellige søylediagrammene, nåværende verdier vises i feltene</font></p></center><br> <br>
			<div class="adminTab7">
			<form method="POST"><label>Gjennomsnittlig bruk av pappkrus:</label><input type='number' class="tab7Input" placeholder='<?php echo $papercup_avrg;?>' name='papp_avrg'><input type='submit'  name='pappkrus_avrg' value='Oppdater'></form>
			</div>
			<br>
			<div class="adminTab7">
			<form method="POST"><label>Mål på forbruk av pappkrus:</label><input type='number' class="tab7Input" placeholder='<?php echo $papercup_wish;?>' name='papp_mål'><input type='submit'  name='pappkrus_mål' value='Oppdater'></form><br>
			</div>
			<br>
			<div class="adminTab7">
			<form method="POST"><label>Gjennomsnittlig bruk av kopipapir:</label><input type='number' class="tab7Input" placeholder='<?php echo $paper_avrg;?>' name='papir_avrg'><input type='submit' name='kopipapir_avrg' value='Oppdater'></form>
			</div>
			<div class="adminTab7">
			<form method="POST"><label>Mål på forbruk av kopipapir:</label><input type='number' class="tab7Input" placeholder='<?php echo $paper_wish;?>' name='papir_mål'><input type='submit' name='kopipapir_mål' value='Oppdater'></form><br>
			</div>
			
			<div class="adminTab7">
			<form method="POST"><label>Gjennomsnittlig kjørelengde per ansatt i tjeneste:</label><input type='number' class="tab7Input" placeholder='<?php echo $transport_avrg;?>' step="0.1" name='kjøre_avrg'><input type='submit' name='kjørelengde_avrg' value='Oppdater'></form>
			</div>
			<div class="adminTab7">
			<form method="POST"><label>Mål for kjørelengde per ansatt i tjeneste:</label><input type='number' class="tab7Input" placeholder='<?php echo $transport_wish;?>' step="0.1" name='kjøre_mål'><input type='submit' name='kjørelengde_mål' value='Oppdater'></form><br>
			</div>
			
			<div class="adminTab7">
			<form method="POST"><label>Energiforbruk Kristiansand KWh/m2 per år:</label><input type='number' class="tab7Input" placeholder='<?php echo $energi_kristiansand;?>' name='energi'><input type='submit' name='kristiansand' value='Oppdater'></form>
			</div>
			<div class="adminTab7">
			<form method="POST"><label>Energiforbruk Flekkefjord KWh/m2 per år:</label><input type='number' class="tab7Input" placeholder='<?php echo $energi_flekkefjord;?>' name='energi'><input type='submit' name='flekkefjord' value='Oppdater'></form>
			</div>
			<div class="adminTab7">
			<form method="POST"><label>Energiforbruk Arendal KWh/m2 per år:</label><input type='number' class="tab7Input" placeholder='<?php echo $energi_arendal;?>' name='energi'><input type='submit' name='arendal' value='Oppdater'></form>
			</div>
			<div class="adminTab7">
			<form method="POST"><label>Energiforbruk Gjennomsnitt SSHF KWh/m2 per år:</label><input type='number' class="tab7Input" placeholder='<?php echo $energi_sshf_avrg;?>' name='energi'><input type='submit' name='sshf' value='Oppdater'></form>
			</div>
			<div class="adminTab7">
			<form method="POST"><label>Energiforbruk Normalforbruk beregnet til sykehus KWh/m2 per år:</label><input type='number' class="tab7Input" placeholder='<?php echo $energi_normalforbruk;?>' name='energi'><input type='submit' name='normalforbruk' value='Oppdater'></form>
			</div>
			
			<div class="adminTab7">
			<form method="POST"><label>Areal Gjennomsnittskontor:</label><input type='number' class="tab7Input" placeholder='<?php echo $areal_kontor;?>' name='energi'><input type='submit' name='kontor' value='Oppdater'></form>
			</div>
			<div class="adminTab7">
			<form method="POST"><label>Areal Gjennomsnitsavdeling:</label><input type='number' class="tab7Input" placeholder='<?php echo $areal_avdeling;?>' name='energi'><input type='submit' name='avdeling' value='Oppdater'></form><br>
			</div>	
<!-- Here comes the funfact code, this changes the text that is diplayed next to the graphs -->			
<?php
	if(isset($_POST['update_pappkrus'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE funfacts SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'pappkrus'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
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
	else
	{
		echo " Virket ikke!";
	}
			?>
			


<form  action="admin-panel.php#tab7" method="POST">
<div class="grid_14">
<center><br> <br><p><font size="5">Her er tekstboksene som vises på siden av grafene</font></p></center><br> <br>
<table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Pappkrus</td><td>Overskrift: <input type=text size="35%" name="teksttopic" value="<?php echo     $overskrift;?>"></td>
  </tr>
  <tr>
  <td>Informasjon</td><td><textarea name="tekstinfo" rows="10" cols="60"><?php echo $tekst;?>     </textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update_pappkrus" value="Oppdater"></td>
  </tr>
  </table>
  </form>
  
  <?php
	if(isset($_POST['kopipapir'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE funfacts SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'kopipapir'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
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
	else
	{
		echo " Virket ikke!";
	}
?>

<form  action="admin-panel.php#tab7" method="POST">
<table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Kopipapir</td><td>Overskrift: <input type=text size="35%" name="teksttopic" value="<?php echo     $overskrift;?>"></td>
  </tr>
  <tr>
  <td>Informasjon</td><td><textarea name="tekstinfo" rows="10" cols="60"><?php echo $tekst;?>     </textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="kopipapir" value="Oppdater"></td>
  </tr>
  </table>
  </form>
    <?php
	if(isset($_POST['transport'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE funfacts SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'transport'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
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
	else
	{
		echo " Virket ikke!";
	}
?>

<form  action="admin-panel.php#tab7" method="POST">
<table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Transport</td><td>Overskrift: <input type=text size="35%" name="teksttopic" value="<?php echo     $overskrift;?>"></td>
  </tr>
  <tr>
  <td>Informasjon</td><td><textarea name="tekstinfo" rows="10" cols="60"><?php echo $tekst;?>     </textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="transport" value="Oppdater"></td>
  </tr>
  </table>
  </form>
     <?php
	if(isset($_POST['ditt_areal'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE funfacts SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'ditt_areal'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
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
	else
	{
		echo " Virket ikke!";
	}
?>

<form  action="admin-panel.php#tab7" method="POST">
<table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Energi - Ditt areal</td><td>Overskrift: <input type=text size="35%" name="teksttopic" value="<?php echo     $overskrift;?>"></td>
  </tr>
  <tr>
  <td>Informasjon</td><td><textarea name="tekstinfo" rows="10" cols="60"><?php echo $tekst;?>     </textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="ditt_areal" value="Oppdater"></td>
  </tr>
  </table>
  </form>
   <?php
	if(isset($_POST['sykehusene'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE funfacts SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'sykehusene'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
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
	else
	{
		echo " Virket ikke!";
	}
?>
<form  action="admin-panel.php#tab7" method="POST">
<table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Energi - Sykehusene</td><td>Overskrift: <input type=text size="35%" name="teksttopic" value="<?php echo     $overskrift;?>"></td>
  </tr>
  <tr>
  <td>Informasjon</td><td><textarea name="tekstinfo" rows="10" cols="60"><?php echo $tekst;?>     </textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="sykehusene" value="Oppdater"></td>
  </tr>
  </table>
  </form>
  <div class="adminTab7">
  <center><br> <br><p><font size="5">Her er verdiene til nøkklene i diagrammene, altså hva de forskjellige fargene betyr</font></p></center>
  </div>
  <!-- Here comes the legend code, this code updates what the lagend displeyed in the graph pictures say -->
    <?php
	if(isset($_POST['papercup'])){
	$legend1 = $_POST['legend1'];
	$legend2 = $_POST['legend2'];
	$legend3 = $_POST['legend3'];
		$stmt = $mysqli->prepare("UPDATE legend SET legend1 = ?, legend2 = ?, legend3 = ?
											WHERE tabell = 'Forbruk Engangsartikler - Pappkrus'
											LIMIT 1");
		$stmt->bind_param('sss', $legend1, $legend2, $legend3);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT legend1, legend2, legend3
        FROM legend
		WHERE tabell = 'Forbruk Engangsartikler - Pappkrus'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($l1, $l2, $l3);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
?>
<form  action="admin-panel.php#tab7" method="POST">
<table <border=0 align=center bgcolor=#d0d7e9 width="620">
  <tr>
  <td width="305">Diagramnøkkler</td><td>Forbruk Engangsartikler - Pappkrus</td>
  </tr>
  <tr>
  <td>Ditt forbruk/ blå farge</td><td><input type=text name="legend1" value="<?php echo $l1;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Gjennomsnittet/ rosa farge</td><td><input type=text name="legend2" value="<?php echo $l2;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Målet vårt/ grønn farge</td><td><input type=text name="legend3" value="<?php echo $l3;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="papercup" value="Oppdater"></td>
  </tr>
  </table>
  </form>
 <br>
    <?php
	if(isset($_POST['paper'])){
	$legend1 = $_POST['legend1'];
	$legend2 = $_POST['legend2'];
	$legend3 = $_POST['legend3'];
		$stmt = $mysqli->prepare("UPDATE legend SET legend1 = ?, legend2 = ?, legend3 = ?
											WHERE tabell = 'Forbruk Engangsartikler - Kopipapir'
											LIMIT 1");
		$stmt->bind_param('sss', $legend1, $legend2, $legend3);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT legend1, legend2, legend3
        FROM legend
		WHERE tabell = 'Forbruk Engangsartikler - Kopipapir'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($l1, $l2, $l3);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
?>
<form  action="admin-panel.php#tab7" method="POST">
<table < border=0 align=center bgcolor=#d0d7e9 width="620">
  <tr>
  <td width="305">Diagramnøkkler</td><td>Forbruk Engangsartikler - Kopipapir</td>
  </tr>
  <tr>
  <td>Ditt forbruk/ blå farge</td><td><input type=text name="legend1" value="<?php echo $l1;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Gjennomsnittet/ rosa farge</td><td><input type=text name="legend2" value="<?php echo $l2;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Målet vårt/ grønn farge</td><td><input type=text name="legend3" value="<?php echo $l3;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="paper" value="Oppdater"></td>
  </tr>
  </table>
  </form>
	 <br>		  
<?php
	if(isset($_POST['transport_legend'])){
	$legend1 = $_POST['legend1'];
	$legend2 = $_POST['legend2'];
	$legend3 = $_POST['legend3'];
		$stmt = $mysqli->prepare("UPDATE legend SET legend1 = ?, legend2 = ?, legend3 = ?
											WHERE tabell = 'Transport - Kilometer reist i tjenestetid'
											LIMIT 1");
		$stmt->bind_param('sss', $legend1, $legend2, $legend3);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT legend1, legend2, legend3
        FROM legend
		WHERE tabell = 'Transport - Kilometer reist i tjenestetid'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($l1, $l2, $l3);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
?>
<form  action="admin-panel.php#tab7" method="POST">
<table < border=0 align=center bgcolor=#d0d7e9 width="620">
  <tr>
  <td width="305">Diagramnøkkler</td><td>Transport - Kilometer reist i tjenestetid</td>
  </tr>
  <tr>
  <td>Ditt forbruk/ blå farge</td><td><input type=text name="legend1" value="<?php echo $l1;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Gjennomsnittet/ rosa farge</td><td><input type=text name="legend2" value="<?php echo $l2;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Målet vårt/ grønn farge</td><td><input type=text name="legend3" value="<?php echo $l3;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="transport_legend" value="Oppdater"></td>
  </tr>
  </table>
  </form>
 <br>
<?php
	if(isset($_POST['Energi_kristiansand'])){
	$legend1 = $_POST['legend1'];
	$legend2 = $_POST['legend2'];
	$legend3 = $_POST['legend3'];
		$stmt = $mysqli->prepare("UPDATE legend SET legend1 = ?, legend2 = ?, legend3 = ?
											WHERE tabell = 'Energi - Energiforbruk ditt areal - Kristiansand'
											LIMIT 1");
		$stmt->bind_param('sss', $legend1, $legend2, $legend3);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT legend1, legend2, legend3
        FROM legend
		WHERE tabell = 'Energi - Energiforbruk ditt areal - Kristiansand'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($l1, $l2, $l3);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
?>
<form  action="admin-panel.php#tab7" method="POST">
<table < border=0 align=center bgcolor=#d0d7e9 width="620">
  <tr>
  <td width="305">Diagramnøkkler</td><td>Energi - Energiforbruk ditt areal - Kristiansand</td>
  </tr>
  <tr>
  <td>Ditt forbruk/ blå farge</td><td><input type=text name="legend1" value="<?php echo $l1;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Gjennomsnittet/ rosa farge</td><td><input type=text name="legend2" value="<?php echo $l2;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Målet vårt/ grønn farge</td><td><input type=text name="legend3" value="<?php echo $l3;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="Energi_kristiansand" value="Oppdater"></td>
  </tr>
  </table>
  </form>
   <br>
  <?php
	if(isset($_POST['Energi_flekkefjord'])){
	$legend1 = $_POST['legend1'];
	$legend2 = $_POST['legend2'];
	$legend3 = $_POST['legend3'];
		$stmt = $mysqli->prepare("UPDATE legend SET legend1 = ?, legend2 = ?, legend3 = ?
											WHERE tabell = 'Energi - Energiforbruk ditt areal - Flekkefjord'
											LIMIT 1");
		$stmt->bind_param('sss', $legend1, $legend2, $legend3);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT legend1, legend2, legend3
        FROM legend
		WHERE tabell = 'Energi - Energiforbruk ditt areal - Flekkefjord'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($l1, $l2, $l3);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
?>
<form  action="admin-panel.php#tab7" method="POST">
<table < border=0 align=center bgcolor=#d0d7e9 width="620">
  <tr>
  <td width="305">Diagramnøkkler</td><td>Energi - Energiforbruk ditt areal - Flekkefjord</td>
  </tr>
  <tr>
  <td>Ditt forbruk/ blå farge</td><td><input type=text name="legend1" value="<?php echo $l1;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Gjennomsnittet/ rosa farge</td><td><input type=text name="legend2" value="<?php echo $l2;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Målet vårt/ grønn farge</td><td><input type=text name="legend3" value="<?php echo $l3;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="Energi_flekkefjord" value="Oppdater"></td>
  </tr>
  </table>
  </form>
  <br>
   <?php
	if(isset($_POST['Energi_arendal'])){
	$legend1 = $_POST['legend1'];
	$legend2 = $_POST['legend2'];
	$legend3 = $_POST['legend3'];
		$stmt = $mysqli->prepare("UPDATE legend SET legend1 = ?, legend2 = ?, legend3 = ?
											WHERE tabell = 'Energi - Energiforbruk ditt areal - Arendal'
											LIMIT 1");
		$stmt->bind_param('sss', $legend1, $legend2, $legend3);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT legend1, legend2, legend3
        FROM legend
		WHERE tabell = 'Energi - Energiforbruk ditt areal - Arendal'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($l1, $l2, $l3);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
?>
<form  action="admin-panel.php#tab7" method="POST">
<table < border=0 align=center bgcolor=#d0d7e9 width="620">
  <tr>
  <td width="305">Diagramnøkkler</td><td>Energi - Energiforbruk ditt areal - Arendal</td>
  </tr>
  <tr>
  <td>Ditt forbruk/ blå farge</td><td><input type=text name="legend1" value="<?php echo $l1;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Gjennomsnittet/ rosa farge</td><td><input type=text name="legend2" value="<?php echo $l2;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Målet vårt/ grønn farge</td><td><input type=text name="legend3" value="<?php echo $l3;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="Energi_arendal" value="Oppdater"></td>
  </tr>
  </table>
  </form>
	 <br>		
   <?php
	if(isset($_POST['Energi_kontor'])){
	$legend1 = $_POST['legend1'];
	$legend2 = $_POST['legend2'];
	$legend3 = $_POST['legend3'];
	$legend4 = $_POST['legend4'];
	$legend5 = $_POST['legend5'];
		$stmt = $mysqli->prepare("UPDATE legend SET legend1 = ?, legend2 = ?, legend3 = ?, legend4 = ?, legend5 = ?
											WHERE tabell = 'Energi - Energiforbruk per lokasjon - kontor'
											LIMIT 1");
		$stmt->bind_param('sssss', $legend1, $legend2, $legend3, $legend4, $legend5);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT legend1, legend2, legend3, legend4, legend5
        FROM legend
		WHERE tabell = 'Energi - Energiforbruk per lokasjon - kontor'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($l1, $l2, $l3, $l4, $l5);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
?>
<form  action="admin-panel.php#tab7" method="POST">
<table <border=0 align=center bgcolor=#d0d7e9 width="620">
  <tr>
  <td width="305">Diagramnøkkler</td><td>Energi - Energiforbruk per lokasjon - kontor</td>
  </tr>
  <tr>
  <td>Flekkefjord Sykehus/ Blå farge</td><td><input type=text name="legend1" value="<?php echo $l1;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Kristiansand Sykehus/ Rosa farge</td><td><input type=text name="legend2" value="<?php echo $l2;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Arendal Sykehus/ Grønn farge</td><td><input type=text name="legend3" value="<?php echo $l3;?>" style="width: 300px"></td>
  </tr>
    <tr>
  <td>SSHF Gjennomsnitt/ Lysegrønn farge</td><td><input type=text name="legend4" value="<?php echo $l4;?>" style="width: 300px"></td>
  </tr>
    <tr>
  <td>Antatt normalforbruk for sykehus/ Beige farge</td><td><input type=text name="legend5" value="<?php echo $l5;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="Energi_kontor" value="Oppdater"></td>
  </tr>
  </table>
  </form>
   <br>
   <?php
	if(isset($_POST['Energi_avdeling'])){
	$legend1 = $_POST['legend1'];
	$legend2 = $_POST['legend2'];
	$legend3 = $_POST['legend3'];
	$legend4 = $_POST['legend4'];
	$legend5 = $_POST['legend5'];
		$stmt = $mysqli->prepare("UPDATE legend SET legend1 = ?, legend2 = ?, legend3 = ?, legend4 = ?, legend5 = ?
											WHERE tabell = 'Energi - Energiforbruk per lokasjon - Avdeling'
											LIMIT 1");
		$stmt->bind_param('sssss', $legend1, $legend2, $legend3, $legend4, $legend5);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT legend1, legend2, legend3, legend4, legend5
        FROM legend
		WHERE tabell = 'Energi - Energiforbruk per lokasjon - Avdeling'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($l1, $l2, $l3, $l4, $l5);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
?>
<form  action="admin-panel.php#tab7" method="POST">
<table <border=0 align=center bgcolor=#d0d7e9 width="620">
  <tr>
  <td width="305">Diagramnøkkler</td><td>Energi - Energiforbruk per lokasjon - Avdeling</td>
  </tr>
  <tr>
  <td>Flekkefjord Sykehus/ Blå farge</td><td><input type=text name="legend1" value="<?php echo $l1;?>"  style="width: 300px"></td>
  </tr>
  <tr>
  <td>Kristiansand Sykehus/ Rosa farge</td><td><input type=text name="legend2" value="<?php echo $l2;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td>Arendal Sykehus/ Grønn farge</td><td><input type=text name="legend3" value="<?php echo $l3;?>" style="width: 300px"></td>
  </tr>
    <tr>
  <td>SSHF Gjennomsnitt/ Lysegrønn farge</td><td><input type=text name="legend4" value="<?php echo $l4;?>" style="width: 300px"></td>
  </tr>
    <tr>
  <td>Antatt normalforbruk for sykehus/ Beige farge</td><td><input type=text name="legend5" value="<?php echo $l5;?>" style="width: 300px"></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="Energi_avdeling" value="Oppdater"></td>
  </tr>
  </table>
  </form>
					
</div></div>	
		</section>
<?php else : ?>
            <p>
                <span class="error">Du har ikke autorisasjon til å se denne siden, du blir nå videresendt til login siden.</span>
				<?php header( "refresh:5; ./login.php" ); //wait for 5 seconds before redirecting?>
            </p>
        <?php endif; ?>
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