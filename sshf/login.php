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
    
   <div class="grid_6">
      <h2 class="inset__1">Logg Inn</h2>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="includes/process_login.php" method="post" name="login_form">                      
            Email: <input type="text" name="email" />
            Passord: <input type="password" 
                             name="password" 
                             id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
 
	<form action="includes/resetmail.php" method="post" name="reset_form"> 
	<br/><br/>
			Glemt passordet? <br/>
            <input type="text" name="email"  placeholder="Fyll inn emailadressen din her:" />
            <input type="submit" value="Send"/> 
        </form><br>
		
		
		
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
			echo '<p>Legg til/endre sikkerhetsspørsmål <a href="security_question.php"><u>Her!</u></a></p>';
            echo '<p>Ønsker du å logge ut? <a href="includes/logout.php"><u>Logg ut</u></a></p>';
			echo '<p>Ønsker du å bytte passord? <a href="change_password.php"><u>Bytt passord</u></a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'><button>register</button></a></p>";
                }
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