<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

$newstopic = $_POST['newstopic'];
$newsinfo= $_POST['newsinfo'];
$newsphoto = addslashes (file_get_contents($_FILES['newsphoto']['tmp_name']));
$image = getimagesize($_FILES['newsphoto']['tmp_name']);//to know about image type etc

$imgtype = $image['mime'];

$q ="INSERT INTO post VALUES('','$newstopic','$newsinfo','$newsphoto','$imgtype')";

$r = mysqli_query($mysqli,$q);
if($r)
{
	?>
		<script>
		alert('Information stored successfully');
		window.location.href='admin-panel.php#tab3';
		</script>
		<?php
}
else
{
echo mysqli_error($mysqli);
}


?>