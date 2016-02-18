<?php
include_once '../includes/db_connect.php';


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
	
	<table width="60%" border="1">
    
    <th colspan="6">Din miljødata.<label><a href="filemanager.php">Last opp ny data</a></label></th>
	 
    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($mysqli, $sql);
	//$stmt = $mysqli->prepare($sql);
	//$stmt->execute();
	//$stmt->store_result($data);
	while($row=mysqli_fetch_array($result_set)){
	
		echo "<table width=60% border='1' cellpadding='10'>";
	
		echo "<tr> <th>Filnavn</th> <th>Filtype</th> <th>Filstørrelse (KB)</th> <th>ID</th> <th>Last ned</th> <th>Slett</th> </tr>";
	
		echo "<tr>";
		echo '<td>' . $row['file'] . '</td>';
		echo '<td>' . $row['type'] . '</td>';
		echo '<td>' . $row['size'] . '</td>';
		echo '<td>' . $row['id'] . '</td>';
		
		echo '<td><a href="download.php?id=' . $row['id'] . '">Download</a></td>';
					
		echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';	
	
		
		echo "</tr>"; 
		
		// close table>
		echo "</table>";
	}
		
		?>
	
		
      
    
	<!-- </table> -->
    
</div>
</body>
</html>