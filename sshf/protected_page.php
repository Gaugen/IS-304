<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
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
        <?php if (login_check($mysqli) == true) : ?>
            <p>Velkommen <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>Her kan du enten bytte passord eller legge til/endre sikkerhetsspørsmål som vil bli brukt dersom du glemmer passordet og velger å sende en gjenopprettingsmail. </p>
			<p><a href="security_question.php"><u>Legg til/endre sikkerhetsspørsmål</u></a></p>
			<p><a href="change_password.php"><u>Bytt passord</u></a></p>
			<p><a href="includes/logout.php"><u>Logg ut</u></a></p>
        <?php else : ?>
            <p>
                <span class="error">Du har ikke autorisasjon til å se denne siden.</span> Vennligst <a href="login.php"><button>logg inn</button></a>.
            </p>
        <?php endif; ?>
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