<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 


$newsno = isset($_GET['newsno']) ? $_GET['newsno'] : null;
$q = "SELECT newsphoto,newsphototype FROM post where newsno='$newsno'";
$r = mysqli_query($mysqli,"$q");
if($r)
{
$row = mysqli_fetch_array($r);
	//Hvis row er tom, kjør ny spørring
if(empty($row['newsphoto'])) {
	$q = "SELECT newsphoto,newsphototype FROM post where newsno='1' LIMIT 1";
	$r = mysqli_query($mysqli,"$q");
	// ID 1 should always exist.
	$row = mysqli_fetch_array($r);
}
$type = "Content-type: ".$row['newsphototype'];
header($type);
echo $row['newsphoto'];
}
else
{
echo mysqli_error();
}

?>