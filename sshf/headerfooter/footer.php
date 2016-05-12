<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no" />
<?php
	
	if(isset($_POST['update8'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Footer1'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Footer1'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($footer1);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	
	<?php
	
	if(isset($_POST['update9'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Footer2'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Footer2'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($footer2);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
</head>
<body>
<header>
</header>
<!--==============================
              footer_top
=================================-->
<div class="footer-top">
  <div class="container_12">
    <div class="grid_12">
      <div class="sep-1"></div>
    </div>
    <div class="grid_4">
      <a href="http://www.sshf.no" rel="nofollow"><address class="address-1"> <div class="fa fa-home"></div><p><font size="4"><?php echo nl2br ($footer1); ?><p></font></address></a>  
    </div>
    <div class="grid_3">
      <a href="contacts.php" class="mail-1"><span class="fa fa-envelope"></span><p><font size="4"><?php echo nl2br ($footer2); ?><p></font></a>
    </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<!--==============================
              footer
=================================-->
</div>
<footer id="footer">
  <div class="container_12">
    <div class="grid_12">
      <div class="sub-copy">4400 &copy; <span id="copyright-year"></span> | <a href="#">Privacy Policy</a> <br> Nettsiden er laget som ett bachelor prosjekt av gruppe 4400.</div>
    </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>