<?php
//error_reporting(E_ALL);
// rand(1000,100000)."-".
include_once '../includes/db_connect.php';

if(isset($_POST['btn-upload']))
{    
    // Variables giving file information 
	$file =$_FILES['file']['name'];
    $file_loc = isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name']: null ;
	$file_size = isset($_FILES['file']['size']) ? $_FILES['file']['size']: null ;
	$file_type = isset($_FILES['file']['type']) ? $_FILES['file']['type']: null ;
	$file_path = isset($_FILES['file']['path']) ? $_FILES['file']['path']: null ;
	$beskrivelse= $_POST['beskrivelse'];
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	
	// make file name in lower case
	$new_file_name = strtolower($file);
		
	//$final_file=str_replace(' ','-',$new_file_name);
	
	//if(move_uploaded_file($file_loc,$folder.$final_file))
	if(move_uploaded_file($file_loc,$folder.$new_file_name))
	{
		$path = "$folder" . "$new_file_name"; 
		//$sql="INSERT INTO tbl_uploads(file,type,size,path) VALUES('$new_file_name','$file_type','$new_size','$path')";- placement of the upload
		//mysql_query($sql)or die(mysqli_error($db));
		if ($insert_stmt = $mysqli->prepare("INSERT INTO tbl_uploads(file,type,size,path,beskrivelse) VALUES (?,?,?,?,?)")) {
			$insert_stmt->bind_param('sssss',$new_file_name, $file_type, $new_size, $path, $beskrivelse);
			if(! $insert_stmt->execute()) {
				echo "couldn't execute";
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