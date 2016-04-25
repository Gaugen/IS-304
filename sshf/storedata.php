<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

$teksttopic = $_POST['teksttopic'];
$tekstinfo= $_POST['tekstinfo'];

$q ="INSERT INTO tekstbokser VALUES('','$teksttopic','$tekstinfo')";

$r = mysqli_query($mysqli,$q);
if($r)
{
	?>
		<script>
		alert('Information stored successfully');
		window.location.href='admin-panel.php#tab4';
		</script>
		<?php
}
else
{
echo mysqli_error($mysqli);
}


?>