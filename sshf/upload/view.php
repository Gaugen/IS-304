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
	
	<!-- <table width="80%" border="1">
    <tr>
    <th colspan="6">Din miljødata.           <label><a href="index.php">Last opp ny data</a></label></th>
    </tr>
   
	<tr>
    <td>Filnavn</td>
    <td>Filtype</td>
    <td>Filstørrelse(KB)</td>
    <td>Se/Last ned</td>
	<td>Slett opplasting</td>
    </tr>
	 -->
	 
    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set)){
	
		echo "<table border='1' cellpadding='10'>";
	
		echo "<tr> <th>Filnavn</th> <th>Filtype</th><th>Filstørrelse (KB)</th><th>ID</th><th>Last ned</th><th>Slett</th></tr>";
	
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