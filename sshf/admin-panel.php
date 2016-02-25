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
<html lang="en">
<head>
<title>Dokumenter</title>
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
</head>
<body class="page1" id="top">
<!--==============================
              header
=================================-->
<div class="main">
<header>
<div class="topplinje"><a class="button" href="login.php">
<?php 
    if(login_check($mysqli) == true){ 
       	echo '<a href="admin-panel.php"><span>Admin &nbsp;</span></a></li>';
		echo '<a>&nbsp;|&nbsp;</a>';
		echo $_SESSION['username'];
		echo '<a>&nbsp;|&nbsp;</a>';
        echo '<a href="includes/logout.php"><span>&nbsp;Logout</span></a></li>';
        }
    elseif(login_check($mysqli) == false) 
        echo '<a href="login.php"><span>Login/Register</span></a></li>';
    ?>
	</a></div>
  <div class="container_12">
		<img src="images/logo.png" style="float:left" />
		<nav>
              <ul class="sf-menu">
               <li class="current">
			   <div class="dropdown">
				<button class="dropMenu">MENY</button>
					<div class="dropdown-content">
					<br>
					<h3><center>Skrive noe her kanskje?</center></h3>
					<br>
					<div class="grid_5">
					<a href="index.php">Hjem</a>
					<a href="documents.php">Dokumenter</a>
					<a href="about.php">Om oss</a>
					</div>
					<div class="grid_5">
					<a href="environment.php">Miljø</a>
					<a href="contacts.php">Kontakt</a>
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
<!--=====================
          Content
======================-->
<section id="content">
  <div class="container_12">
	<article class="tabs">

	<section id="tab1">
		<h2><a href="#tab1">Tab 1</a></h2>
		asd
	</section>
	
	<section id="tab2">
		<h2><a href="#tab2">File manager</a></h2>
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
	
<table width="90%" border="1">
    
    <th colspan="6">Din miljødata</th>
	 
    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($mysqli, $sql);
	//$stmt = $mysqli->prepare($sql);
	//$stmt->execute();
	//$stmt->store_result($data);
	while($row=mysqli_fetch_array($result_set)){
	
		echo "<table width=90% border='1' cellpadding='10'>";
	
		echo '<tr> <th width="35%">Filnavn</th> <th width="15%">Filtype</th> <th width="10%">Filstørrelse (KB)</th> <th width="10%">ID</th> <th width="10%">Last ned</th> <th width="10%">Slett</th> </tr>';
	
		echo "<tr>";
		echo '<td>' . $row['file'] . '</td>';
		echo '<td>' . $row['type'] . '</td>';
		echo '<td>' . $row['size'] . '</td>';
		echo '<td>' . $row['id'] . '</td>';
		
		echo '<td><a href="files/download.php?id=' . $row['id'] . '"><button>Last Ned</button></a></td>';
					
		echo '<td><a href="files/delete.php?id=' . $row['id'] . '"><button>Slett</button></a></td>';	
	
		
		echo "</tr>"; 
		
		// close table>
		echo "</table>";
	}
		
		?>
	</section>
	
	<section id="tab3">
		<h2><a href="#tab3">Newsfeed</a></h2>
		<form enctype="multipart/form-data" action="storeinfo.php" method="POST">
		<table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
		<tr><td colspan=3>Nyheter</td></tr>
		<tr>
		<td>Tema</td><td><input type=text size="35%" name="newstopic"></td>
		</tr>
		<tr>
		<td>Informasjon</td><td><textarea name="newsinfo" id="newsinfo" rows="10" cols="60"></textarea></td>
		</tr>
		<tr>
		<td>Bilde</td><td><input type=file name="newsphoto"></td>
		</tr>
		<tr>
		<td></td><td><input type=submit name="submit" value="Post"></td>
		</tr>
		</table>
		</form>
		<?php


if (isset($_POST['delete'])){
	$DeleteQuery = "DELETE FROM post WHERE newstopic='$_POST[hidden]'";
	mysqli_query($mysqli, $DeleteQuery);
};

echo "<div class=newsekko>";

$q = "SELECT * FROM post";
$r = mysqli_query($mysqli, "$q");
if($r)
{
while($row=mysqli_fetch_array($r)){
	echo "<form action=admin-panel.php method=post>";
	echo "<div class=container>";
	echo "<div class=newsheader>";
	echo "<h7>";
	echo $row['newstopic'];
	echo "</h7>";
	echo "</div>";
	echo "<img src=image.php?newsno=".$row['newsno']." width=184 height=185/>";
	echo "<div class=tb2>";
	echo $row['newsinfo'];
	echo "</div>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $row['newstopic'] . " </td>";
	echo "<div class=newsfooter>";
	echo "<td>" .  "<input type=submit name=delete value=Delete>" . "</td>";
	echo "</div>";
	echo "</br>";
	echo "</form>";
	echo "</div>";
}
echo "</div>";

}

else
{
echo mysqli_error($mysqli);
}
?>
	</section>

</article>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
     <div class="clear"></div>
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