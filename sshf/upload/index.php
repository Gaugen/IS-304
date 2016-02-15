<?php
include_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Miljødata Opplastinger</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Miljødata Opplastinger</label>
</div>
<div id="body">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">Last opp</button>
	</form>
    <br /><br />
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>Data opplastet...  <a href="view.php">Trykk her for å se data.</a></label>
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
	
	// delete.php function import
	
	?>
	
</div>
<div id="footer">
<label></a></label>
</div>
</body>
</html>