<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>


<body>
<?php
mysql_connect("localhost", "root", "") or die('cannot connect to server');
mysql_select_db("download") or die('cannot connect to database');
$res=mysql_query("select * from table1");
echo "<table>";
while($row=mysql_fetch_array($res))	
{
echo "<tr>";
echo "<td>"; echo $row["name"]; echo "</td>";
/*echo "<td>";?><a href="<?php echo $row["path"]; ?>">Download</a> <?php echo "</td>";
*/
echo "</tr>";
				

}
echo "</table>";
?>

</body>
</html>