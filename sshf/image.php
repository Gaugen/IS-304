<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

$newsno = (isset($_GET['newsno']) ? $_GET['newsno'] : null);
$q = "SELECT newsphoto,newsphototype FROM post where newsno='$newsno'";
$r = mysqli_query($mysqli,"$q");
if($r)
{

$row = mysqli_fetch_array($r);
$type = "Content-type: ".$row['newsphototype'];
header($type);
echo $row['newsphoto'];
}
else
{
echo mysqli_error();
}

?>