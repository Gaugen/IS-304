<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'tbl_uploads' table
*/

 // connect to the database
include_once '../includes/db_connect.php';
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
//Delete file from server/Locally
 $sql = "SELECT * FROM tbl_uploads WHERE id=$id";
 $result_set = mysqli_query($mysqli, $sql);
 while($data=mysqli_fetch_array($result_set)) {
	unlink($data['path']);
	//$path = $data['path'];
 }
 
 // delete the entry from database
 $delete ="DELETE FROM tbl_uploads WHERE id=$id";
 $result = mysqli_query($mysqli, $delete) or die(mysqli_error()); 
 
  
 // redirect back to the view page
 header("Location: ../admin-panel.php#tab2");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page

 
 {
 header("Location: ../admin-panel.php#tab2");
 }
  
?>