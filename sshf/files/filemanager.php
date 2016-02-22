<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dokumenter</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="../css/contact-form.css">
<link rel="stylesheet" href="../css/style.css">
<script src="../js/script.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
 });
</script>
</head>
<body class="page1" id="top">
<!--==============================
              header
=================================-->
<div class="main">
<header>
<div class="topplinje"><a class="button" href="login.php"><?php 
    if(login_check($mysqli) == true){ 
        echo $_SESSION['username'];
        echo '<a href="includes/logout.php"><span>&nbsp;Logout</span></a></li>';
		echo '<a href="filemanager.php"><span>&nbsp;Manage files</span></a></li>';
        }
    elseif(login_check($mysqli) == false) 
        echo '<a href="login.php"><span>Login/Register</span></a></li>';
    ?></a></div>
  <div class="container_12">
		<img src="../images/logo.png"  />
  <section id="stuck_container">
  <!--==============================
              Stuck menu
  =================================-->
    <div class="container_12">
        <div class="grid_12">
          <div class="navigation ">
                     <nav><br>
              <ul class="sf-menu">
               <li class="current">
			   <div class="dropdown">
				<button class="dropMenu"><img src ="https://cdn4.iconfinder.com/data/icons/wirecons-free-vector-icons/32/menu-alt-16.png"> Meny</button>
					<div class="dropdown-content">
					<a href="index.php">Hjem</a>
					<a href="documents.php">Dokumenter</a>
					<a href="about.php">Om oss</a>
					<a href="environment.php">Miljø</a>
					<a href="contacts.php">Kontakt</a>
					</div>
				</div></li>
             </ul>
            </nav>
		  <hr class="skille">
         <div class="clear"></div>
     </div>
     <div class="clear"></div>
    </div>
  </section>
</header>
<!--=====================
          Content
======================-->
<section id="content">
  <div class="container_12">
  
 <form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">Last opp</button>
	</form>
    <br /><br />
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>Data opplastet...  </label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Det oppstod et problem under opplasting !</label>
        <?php
	}
	else
	{
		?>
        <label>Trykk velg fil for å laste opp excel-ark</label>
        <?php
	}
	
	?>
	
<table width="60%" border="1">
    
    <th colspan="6">Din miljødata</th>
	 
    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($mysqli, $sql);
	//$stmt = $mysqli->prepare($sql);
	//$stmt->execute();
	//$stmt->store_result($data);
	while($row=mysqli_fetch_array($result_set)){
	
		echo "<table width=60% border='1' cellpadding='10'>";
	
		echo "<tr> <th>Filnavn</th> <th>Filtype</th> <th>Filstørrelse (KB)</th> <th>ID</th> <th>Last ned</th> <th>Slett</th> </tr>";
	
		echo "<tr>";
		echo '<td>' . $row['file'] . '</td>';
		echo '<td>' . $row['type'] . '</td>';
		echo '<td>' . $row['size'] . '</td>';
		echo '<td>' . $row['id'] . '</td>';
		
		echo '<td><a href="download.php?id=' . $row['id'] . '"><button>Last Ned</button></a></td>';
					
		echo '<td><a href="delete.php?id=' . $row['id'] . '"><button>Slett</button></a></td>';	
	
		
		echo "</tr>"; 
		
		// close table>
		echo "</table>";
	}
		
		?>
  </div>
</section>
<!--==============================
              footer_top
=================================-->
<div class="footer-top">
  <div class="container_12">
    <div class="grid_12">
      <div class="sep-1"></div>
    </div>
    <div class="grid_4">
      <address class="address-1"> <div class="fa fa-home"></div>Sørlandet sykehus HF  <br>
Teknologi og E-helse.</address>
    </div>
    <div class="grid_3">
      <a href="#" class="mail-1"><span class="fa fa-envelope"></span>miljo@sshf.no</a>
    </div>
    <div class="grid_4 fright">
      <div class="socials">
        <a href="#">facebook</a>
        <a href="#">twitter</a>
        <a href="#">google+</a>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--==============================
              footer
=================================-->
</div>
<footer id="footer">
  <div class="container_12">
    <div class="grid_12">
      <div class="sub-copy">4400 &copy; <span id="copyright-year"></span> | <a href="#">Privacy Policy</a> <br> Nettsiden er laget som ett bachelor prosjekt av <a href="https://www.facebook.com/steffangraf" rel="nofollow">gruppe 4400.</a></div>
    </div>
    <div class="clear"></div>
  </div>
</footer>
<a href="#" id="toTop" class="fa fa-angle-up"></a>
</body>
</html>