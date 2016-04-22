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
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
<script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/forms.js"></script> 
</head>
    <body class="page1" id="top">

<!--==============================
              header
=================================-->
<div class="main">
<?php include("headerfooter/header.php");?>
<!--=====================
          Content
======================-->
<section id="content">
<div class="container_12">
    
   <div class="grid_6 prefix_3">
     </br>
      <h5>Logg Inn</h5>
	  <hr class="skille">
	    </br>
		  </br>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="includes/process_login.php" method="post" name="login_form"> 
<div class="inputHold">		
            <label>Email:</label> <input type="text" name="email" class="calcInput" placeholder="Email" />
</div>
			</br>
			</br>
			</br>
<div class="inputHold">
            <label>Passord:</label> <input type="password" 
                             name="password" 
                             id="password"
							 class="calcInput"
							 placeholder="Passord"/>
</div>
			</br>
			</br>
			
            <input type="button" 
                   value="Logg inn" 
                   onclick="formhash(this.form, this.form.password);" 
				   class="btnLoginLogin"/> 
        </form>
 <br/><br/>
	<form action="includes/resetmail.php" method="post" name="reset_form"> 
	<br/><br/>
	<div class="inputHold">
			<label>Glemt passord?</label> 
            <input type="text" name="email" class="calcInput" placeholder="Fyll inn Email" />
			<hr style="height:1px; visibility:hidden;" />
            <input type="submit" value="Send"  class="btnLoginLogin"/> 
</div>
        </form><br>

			<br/><br/>	<br/><br/>
			<br/><br/>  <br/><br/>
		
<?php
echo "<div class=inputHold>";
        if (login_check($mysqli) == true) {
                       
        } else {		echo "<label>";
                        echo "<p>Ny bruker?</p>"; 
						echo "</label>";
						echo "<div class=calcInput>";
						echo "<a href='register.php'><input type=submit class=btnLoginRegistrer value=Registrer></a>";
						echo "</div>";
						
				}
echo "</div>";
?>      
     <div class="grid_3 alpha">
        
      </div>
    </div>
    <div class="grid_5 prefix_1">

    </div>
    <div class="clear"></div>
  </div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>