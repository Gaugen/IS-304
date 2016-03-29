<?php
//error_reporting(0);

include_once '../includes/db_connect.php';

if(isset($_POST['btn-upload']))
{    
    // Variables giving file information 
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$file_path = $_FILES['file']['path'];
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	
	// make file name in lower case
	$new_file_name = strtolower($file);
		
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$path = "$folder" . "$new_file_name"; 
		//$sql="INSERT INTO tbl_uploads(file,type,size,path) VALUES('$final_file','$file_type','$new_size','$path')";
		//mysql_query($sql)or die(mysqli_error($db));
		if ($insert_stmt = $mysqli->prepare("INSERT INTO tbl_uploads(file,type,size,path) VALUES (?,?,?,?)")) {
			$insert_stmt->bind_param('ssss',$final_file, $file_type, $new_size, $path);
			if(! $insert_stmt->execute()) {
				header('Location: filemanager.php');
			}
		}
?>
		<script>
		alert('successfully uploaded');
        window.location.href='../admin-panel.php#tab2';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='../admin-panel.php#tab2';
        </script>
		<?php
	}


}


?>