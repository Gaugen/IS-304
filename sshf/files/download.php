<?php
//connects to the database
include_once '../includes/db_connect.php';

// check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['id']) && is_numeric($_GET['id'])){
 // get id value
$id = $_GET['id'];
//prepare query
$download ="SELECT * FROM tbl_uploads WHERE id=$id";
$res = mysqli_query($mysqli, $download);
//puts column values into array and uses them to send the file back to client
while($data = mysqli_fetch_array($res)){
	$name = $data['file'];
	$type = $data['file'];
	header('Content-type: application/octet-stream');
	header('Content-disposition: attachment; filename="' . $name .'"');
	readfile($data['path']);
}

}
 else {
	 echo "Error: Couldn't retrieve ID";
 }
?>