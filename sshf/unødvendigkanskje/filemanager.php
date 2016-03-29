<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
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
<link rel="stylesheet" href="../css/contact-form.css">
<link rel="stylesheet" href="../css/style.css">
<script src="../js/script.js"></script>
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
<?php include("../headerfooter/header.php");?>
<!--=====================
          Content
======================-->
<section id="content">
  <div class="container_12">
  
 <form action="upload.php" method="post" enctype="multipart/form-data">
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
    
    <th colspan="6">Din miljødata</th>
	 
    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($mysqli, $sql);
	//$stmt = $mysqli->prepare($sql);
	//$stmt->execute();
	//$stmt->store_result($data);
	echo "<table width=90% border='1' cellpadding='10'>";
	
	echo '<th width="35%">Filnavn</th> <th width="15%">Filtype</th> <th width="10%">Filstørrelse (KB)</th> <th width="10%">ID</th> <th width="10%">Last ned</th> <th width="10%">Slett</th>';
	while($row=mysqli_fetch_array($result_set)){
	

		echo "<tr>";
		echo '<td>' . $row['file'] . '</td>';
		echo '<td>' . $row['type'] . '</td>';
		echo '<td>' . $row['size'] . '</td>';
		echo '<td>' . $row['id'] . '</td>';
		
		echo '<td><a href="download.php?id=' . $row['id'] . '"><button>Last Ned</button></a></td>';
					
		echo '<td><a href="delete.php?id=' . $row['id'] . '"><button>Slett</button></a></td>';	
	
		
		echo "</tr>"; 
		
		// close table>
		echo "</table>";
	}
		
		?>
  </div>
</section>
<!--==============================
              footer
=================================-->
<?php include("../headerfooter/footer.php");?>
</body>
</html>