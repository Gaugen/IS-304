<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no" />
</head>
<!--==============================
              header
=================================-->
<body>
<header>
<div class="topplinje"><a class="button" href="login.php">
<?php
	
	if(isset($_POST['update1'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu1'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu1'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu1);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php
	
	if(isset($_POST['update2'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu2'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu2'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu2);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	
	<?php
	
	if(isset($_POST['update3'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu3'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu3'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu3);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php
	
	if(isset($_POST['update4'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu4'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu4'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu4);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	<?php
	
	if(isset($_POST['update5'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu5'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu5'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu5);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	
	<?php
	
	if(isset($_POST['update6'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu6'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu6'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu6);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	
	<?php
	
	if(isset($_POST['update7'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu7'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu7'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu7);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	
	<?php
	
	if(isset($_POST['update8'])){
	$mftopic = $_POST['menufootertopic'];
		$stmt = $mysqli->prepare("UPDATE menufooter SET menufootertopic = ?
											WHERE menufooterplassering = 'Menu8'
											LIMIT 1");
		$stmt->bind_param('s', $mftopic);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT menufootertopic
        FROM menufooter
		WHERE menufooterplassering = 'Menu8'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($menu8);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	
<?php 
    if(login_check($mysqli) == true){ 
       	echo '<a href="admin-panel.php#tab1"><span>Admin-panel &nbsp;</span></a></li>';
		echo '<a>&nbsp;|&nbsp;</a>';
		echo '<a href="protected_page.php">'.$_SESSION['username'].'</a>';
		echo '<a>&nbsp;|&nbsp;</a>';
        echo '<a href="includes/logout.php"><span>&nbsp;Logg ut</span></a></li>';
        }
    elseif(login_check($mysqli) == false) 
        echo '<a href="login.php"><span></span></a></li>';
    ?>
	</a></div>
  <div class="container_12">
	<a href="index.php">
		<img src="images/logo.png" style="float:left" />
		</a>
		<nav>
              <ul class="sf-menu">
               <li class="current">
			   <div class="dropdown">
				<button onclick="myFunction()" class="dropbtn">MENY</button>
					<div id="myDropdown" class="dropdown-content">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<div class="grid_5">
					
					<a href="index.php"><?php echo ($menu1); ?></a>
					<a href="about.php"><?php echo ($menu2); ?></a>
					<a href="environment.php"><?php echo ($menu3); ?></a>
					<a href="news.php"><?php echo ($menu8); ?></a>
					
					<form action="login.php"><button class="btnLogin">Logg inn</button></form>
					</div>
					<div class="grid_5">
					
					<a href="documents.php"><?php echo ($menu4); ?></a>
					<a href="calculator.php"><?php echo ($menu5); ?></a>
					<a href="graphs.php"><?php echo ($menu6); ?></a>
					<a href="contacts.php"><?php echo ($menu7); ?></a>
					
					
					</div>
					</div>
				</div></li>
             </ul>
            </nav>
  <section id="stuck_container">
  
  <!--==============================
              Stuck menu
  =================================-->
    <div class="container_12">
        <div class="grid_12">
          <div class="navigation ">
                    
		  <hr class="skille">
         <div class="clear"></div>
     </div>
     <div class="clear"></div>
    </div>
  </section>
</header>
</body>
</html>