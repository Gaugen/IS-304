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
    if(login_check($mysqli) == true){ 
       	echo '<a href="admin-panel.php"><span>Admin &nbsp;</span></a></li>';
		echo '<a>&nbsp;|&nbsp;</a>';
		echo '<a href="protected_page.php">'.$_SESSION['username'].'</a>';
		echo '<a>&nbsp;|&nbsp;</a>';
        echo '<a href="includes/logout.php"><span>&nbsp;Logout</span></a></li>';
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
					
					<a href="index.php">Hjem</a>
					<a href="documents.php">Dokumenter</a>
					<a href="about.php">Om oss</a>
					
					<form action="login.php"><button class="btnLogin">Logg inn</button></form>
					</div>
					<div class="grid_5">
					
					<a href="environment.php">Miljø</a>
					<a href="calculator.php">Kalkulator</a>
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
</body>
</html>