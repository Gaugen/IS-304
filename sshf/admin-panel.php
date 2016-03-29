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

	<article class="tabs">

	<section id="tab1">
		<h2><a href="#tab1">Tab 1</a></h2>
		asd
	</section>
	
	<section id="tab2">
		<h2><a href="#tab2">File manager</a></h2>
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
	echo '<th width="35%">Filnavn</th> <th width="15%">Filtype</th> <th width="15%">Filstørrelse (KB)</th> <th width="5%">ID</th> <th width="10%">Last ned</th> <th width="10%">Slett</th>';
	
	
	while($row=mysqli_fetch_array($result_set)){
		echo "<table width=100% border='1' cellpadding='10'>";
	
	

	
		echo "<tr>";
		echo '<td width="35%">' . $row['file'] . '</td>';
		echo '<td width="15%">' . $row['type'] . '</td>';
		echo '<td width="15%">' . $row['size'] . '</td>';
		echo '<td width="5%">' . $row['id'] . '</td>';
		
		echo '<td width="10%"><a href="files/download.php?id=' . $row['id'] . '"><button>Last Ned</button></a></td>';
					
		echo '<td width="10%"><a href="files/delete.php?id=' . $row['id'] . '"><button>Slett</button></a></td>';	
	
		
		echo "</tr>"; 
		
		// close table>
		echo "</table>";
	}
		//echo "</div>";
		?>
	</section>
	
	<section id="tab3">
		<h2><a href="#tab3">Newsfeed</a></h2>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
     <div class="clear"></div>
</div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>