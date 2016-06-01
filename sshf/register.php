<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
<title>Registrer</title>
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
   
		<?php if (login_check($mysqli) == true) : ?>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h2 class="inset__1">Registrer deg</h2>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
           	<li>Brukernavn kan bare inneholde bare tall, store og små bokstaver og understreker</li>
            <li>Email må ha et godkjent format</li>
            <li>Passord må inneholde minst 6 bokstaver</li>
            <li>Passord må inneholde:
                <ul>
                    <li>Minst èn stor bokstav (A..Z)</li>
                    <li>Minst èn liten bokstav (a..z)</li>
                    <li>Minst ett nummer (0..9)</li>
                </ul>
            </li>
            <li>Passord og bekreft passord må matche</li>
        </ul>
		<!-- form for superadmin to create new admin accounts -->
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
				<div class="inputHold">	
            <label>Brukernavn: </label> <input type='text' 
                name='username' 
                id='username'
				class="calcInput" 	/>
				</div><br>
				<div class="inputHold">	
            <label>Email: </label><input type="text" name="email" id="new_mail" class="calcInput" onkeyup='checkmail()'/>
			</div><br>
			<div class="inputHold">	
            <label>Bekreft email: </label><input type="text" name="conf_email" id="confirm_mail" class="calcInput" onkeyup='checkmail()'/>
			</div><br>
			<div class="inputHold">	
							<label>&nbsp;</label><span id='message1'>
							</div><br>
            <div class="inputHold">	
			<label>Passord:</label> <input type="password"
                             name="password" 
                             id="new_password"
							 class="calcInput"
							 onkeyup='check()'/>
							 </div>
							 <br>
			<div class="inputHold">	
            <label>Bekreft passord: </label><input type="password" 
                                     name="confirmpwd" 
                                     id="confirm_password"
									class="calcInput"	
									onkeyup='check()' />
							</div>
							<div class="inputHold">	
							<label>&nbsp;</label><span id='message'>
							</div>
							<br>
            <input type="button" 
			class="btnLoginLogin"
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
		<br>
		<br>
		<br>
        <a href="login.php"><input type="button" class="btnLoginLogin" value="Tilbake"></a>
    <div class="grid_3 alpha">
        <?php else : ?>
            <p>
                <span class="error">Du har ikke autorisasjon til å se denne siden.</span> Vennligst <a href="login.php"><button>logg inn</button></a>.
            </p>
        <?php endif; ?>
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