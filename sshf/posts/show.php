<link rel="stylesheet" href="style.css" type="text/css">
<?php

//show information
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
sec_session_start();



if (isset($_POST['delete'])){
	$DeleteQuery = "DELETE FROM post WHERE newstopic='$_POST[hidden]'";
	mysqli_query($mysqli, $DeleteQuery);
};



$q = "SELECT * FROM post";
$r = mysqli_query($mysqli, "$q");
if($r)
{

while($row=mysqli_fetch_array($r)){
	echo "<form action=show.php method=post>";
	echo "<div class=container>";
	echo "<div class=newsheader>";
	echo "<h2>";
	echo $row['newstopic'];
	echo "</h2>";
	echo "</div>";
	echo "<img src=image.php?newsno=".$row['newsno']." width=150 height=150/>";
	echo "<div class=tb2>";
	echo $row['newsinfo'];
	echo "</div>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $row['newstopic'] . " </td>";
	echo "</div>";
	echo "</br>";
	echo "</form>";
}


}

else
{
echo mysqli_error();
}
?>