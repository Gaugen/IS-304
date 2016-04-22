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
  <br>
  <br>
  <br>
  <br>
  <center>
<table width="60%" border="1">
    
    <th width="60%">Filnavn</th> <th width="20%">Filstørrelse</th><th width="10%">Last ned</th>
	 
    <?php
	$sql="SELECT * FROM tbl_uploads";
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