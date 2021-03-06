<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<!-- General design handlers -->
<html lang="en">
<head>
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
<title>Miljø</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
 }); 
	
</script>
<body class="page1" id="top">
<!--==============================
              header
=================================-->
<div class="main">
<?php include("headerfooter/header.php");?>
<!--=====================
          Content
======================-->
  <div class="clear"></div>
  <div class="clear"></div>
  
  
  <section id="content">
  
  <div class="container_12">
    <div class="grid_6 prefix_3">
<center>
<?php
	
	if(isset($_POST['update'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE tekstbokser SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'Miljo'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM tekstbokser
		WHERE plassering = 'Miljo'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($overskrift, $tekst);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php if (login_check($mysqli) == true) {?>
	<!-- Check if you're logged in. If so - give option to change content of page --> 
   <div class="grid_6">
      <form  action="environment.php" method="POST">
	  <h2 class="inset__1"><?php echo nl2br ($overskrift); ?></h2>
	  <p><font size="4"><?php echo nl2br ($tekst); ?></p></font>
<div class="dropdownIndex">
<submit onclick="myIndexFunction()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Overskrift</td><td><input type=text size="35%" name="teksttopic" value="<?php echo     $overskrift;?>"></td>
  </tr>
  <tr>
  <td>Informasjon</td><td><textarea name="tekstinfo" rows="10" cols="60"><?php echo $tekst;?>     </textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
	  <div class="grid_8 alpha">
	  <?php }
	  
	  else{?>
	  <!-- If you're not logged in, display this -->  
   <div class="grid_6">
      <h2 class="inset__1"><?php echo nl2br ($overskrift); ?></h2>
	  <p><font size="4"><?php echo nl2br ($tekst); ?></p></font>
	  <div class="grid_8 alpha">
	<?php }?>
	
	
 <h2 class="inset__1"></h2>
	  <br>
      
   
       <div class="grid_6">
         
      
         </div>
   
    
    </div>
     <div class="clear"></div>
     <div class="clear"></div>
    <div class="clear"></div>
	</center>
  </div>
  
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>