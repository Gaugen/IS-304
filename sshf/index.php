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
<title>Home</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
 });
 
 
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body class="page1" id="top" onload= "MM_preloadImages('images/images/images/NavOver_03.jpg','images/images/images/NavOver_05.jpg','images/images/images/NavOver_10.jpg')">
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
    
   <div class="grid_6">
      <h2 class="inset__1">Velkommen!</h2>
	  <p>Hei og velkommen til siden, håper du koser deg og at du får ett nytt syn på din forbruk av glass, reising osv. 
	  <br>Her kommer en del info om siden og hva siden kan tilby! Ha en ellers fortreffelig dag :)</p>
	  <div class="grid_3 alpha">
        
	  <div id="Navbar">
  <p><img src="images/images/Navbar_01.jpg" width="450" height="65" class="top" /></p>
  <p><a href="index.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Engangs','','images/images/images/NavOver_10.jpg',1)"><img src="images/images/Navbar_10.jpg" width="150" height="150" class="imageEngangs" id="Engangs" /></a><a href="index.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Avfall','','images/images/images/NavOver_09.jpg',0)"><img src="images/images/Navbar_09.jpg" width="150" height="150" class="imageAvfall" id="Avfall" /></a><img src="images/images/Navbar_02.jpg" width="67" height="385" class="left" /><a href="index.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Transport','','images/images/images/NavOver_03.jpg',1)"><img src="images/images/Navbar_03.jpg" width="150" height="150" class="imageTransport" id="Transport" /></a><img src="images/images/Navbar_07.jpg" width="150" height="16" class="leftmiddle" /><a href="index.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Energi','','images/images/images/NavOver_05.jpg',1)"><img src="images/images/Navbar_05.jpg" width="150" height="150" class="imageEnergi" id="Energi" /></a><img src="images/images/Navbar_08.jpg" width="150" height="16" class="rightmiddle" /><img src="images/images/Navbar_11.jpg" width="150" height="69" class="leftbottom" /><img src="images/images/Navbar_04.jpg" width="16" height="385" class="middle" float:right; /><img src="images/images/Navbar_12.jpg" width="150" height="69" class="rightbottom" /><img src="images/images/Navbar_06.jpg" width="67" height="385" class="right" /></p>
</div>
      </div>
    </div>
    <div class="grid_5 prefix_1">
	<?php
	echo "<div class=newsekko2>";
		$q = "SELECT * FROM post";
$r = mysqli_query($mysqli, "$q");
if($r)
{

while($row=mysqli_fetch_array($r)){
	echo "<form action=index.php method=post>";
	echo "<div class=container2>";
	echo "<div class=newsheader2>";
	echo "<h7>";
	echo $row['newstopic'];
	echo "</h7>";
	echo "</div>";
	echo "<img src=image.php?newsno=".$row['newsno']." width=180 height=180/>";
	echo "<div class=tb22>";
	echo $row['newsinfo'];
	echo "</div>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $row['newstopic'] . " </td>";
	echo "</div>";
	echo "</br>";
	echo "</form>";
}
echo "</div>";

}

else
{
echo mysqli_error();
}
?>
    </div>
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