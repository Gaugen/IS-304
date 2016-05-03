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
  <br>
  
  <br>
  <br>
  <br>
  <center>
  <?php
	
	if(isset($_POST['update'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE tekstbokser SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'Dokumenter'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM tekstbokser
		WHERE plassering = 'Dokumenter'
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
      <form  action="documents.php" method="POST">
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
  
      <h2 class="inset__1"><?php echo $overskrift; ?></h2>
	  <p><font size="4"><?php echo $tekst; ?></p></font>
	  
	<?php }?>
	<br>


<table width="60%" border="1">
    
    <th width="60%">Filnavn</th> <th width="20%">Filstørrelse</th><th width="10%">Last ned</th>
	 
    <?php
	$sql="SELECT * FROM tbl_uploads ORDER BY id DESC";
	$result_set=mysqli_query($mysqli, $sql);
	//$stmt = $mysqli->prepare($sql);
	//$stmt->execute();
	//$stmt->store_result($data);
	while($row=mysqli_fetch_array($result_set)){
	
		echo "<table width=60% border='1' cellpadding='10'>";
	
		// echo "<tr> <th>Filnavn</th> <th>Filtype</th> <th>Filstørrelse (KB)</th><th>Last ned</th> </tr>";
	
		echo "<tr>";
		echo '<td width="60%"> ' . $row['file'] . '</td>';
		// echo '<td>' . $row['type'] . '</td>';
		echo '<td width="20%">' . $row['size'] . '</td>';
		$row['id'];
	
		
		echo '<td width="10%"><a href="files/download.php?id=' . $row['id'] . '"><button>Last Ned</button></a></td>';
					
	
		
		echo "</tr>"; 
		
		// close table>
		echo "</table>";
	}
		
		?>
		</table>
		</center>
  </div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>