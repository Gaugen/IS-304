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
<title>Min Side</title>
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
    <!-- Different account managment possibility for the user -->
   <div class="grid_6">
        <?php if (login_check($mysqli) == true) : ?>
            <h2>Velkommen <?php echo htmlentities($_SESSION['username']); ?>!</h2>
            <p>Her kan du enten bytte passord eller legge til/endre sikkerhetsspørsmål som vil bli brukt dersom du glemmer passordet og velger å sende en gjenopprettingsmail. </p>
			<p><a href="security_question.php"><u>Legg til/endre sikkerhetsspørsmål</u></a></p>
			<p><a href="change_password.php"><u>Bytt passord</u></a></p>
			<p><a href="includes/logout.php"><u>Logg ut</u></a></p>
			
<?php 
//function only for superadmin, deletes admin users
if(@$_GET['action'] == "delete")
{
	if ($stmt = $mysqli->prepare("Delete
                                    FROM members 
                                    WHERE id = ? LIMIT 1")){
        // Bind "$user_id" to parameter. 
        $stmt->bind_param('i', @$_GET['id']);
        $stmt->execute();   // Execute the prepared query.
									}
}
?>
<?php
//Displays table with admin accounts for the superadmin where he can delete them or create new admin accounts
echo "<div class=inputHold>";
        if (login_check($mysqli) == true) {
			if ($stmt = $mysqli->prepare("SELECT superadmin
                                      FROM members 
                                      WHERE id = ? LIMIT 1")){
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $_SESSION['user_id']);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
			$stmt->bind_result($superadmin);
			$stmt->fetch();
			}
			if ($superadmin == 1){
                echo "<h2>Konto Administrasjon:</h2>";
				echo "<p><a href='register.php'><u>Registrer Ny Admin Bruker</u></a></p>";
				echo "<p> Eller slett noen av de gamle brukerne:</p>";
				
				if ($stmt = $mysqli->prepare("SELECT id, username, email
                                      FROM members 
                                      WHERE id != ?")){
				// Bind "$user_id" to parameter. 
					$stmt->bind_param('i', $_SESSION['user_id']);
					$stmt->execute();   // Execute the prepared query.
					$stmt->store_result();
					$stmt->bind_result($id, $username, $email);
					echo "<table width=100% border='1' cellpadding='10'>";
					echo '<th width="10%">ID</th><th width="30%">Brukernavn</th> <th width="50%">Email</th><th width="10%">Slett</th>';
					while($stmt->fetch()){
						
						
						echo "<tr>";
						echo '<td width="10%"> ' . $id . '</td>';
						echo '<td width="30%"> ' . $username . '</td>';
						echo '<td width="50%">' . $email . '</td>';
						echo '<td width="10%"><a href="protected_page.php?action=delete&id=' . $id . '"><button>Slett</button></a></td>';
						echo "</tr>"; 
						
					}
					echo "</table>";
				}	        		
						
			}
		}
echo "</div>";
?>
<?php
//checks if a sequrity question is set for the user, if not reminds them to set it
			if ($stmt = $mysqli->prepare("SELECT security_question, security_answer 
                                      FROM members 
                                      WHERE id = ? LIMIT 1")){
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $_SESSION['user_id']);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
			$stmt->bind_result($security_question, $security_answer);
			$stmt->fetch();
									  }
			if (empty($security_question) == TRUE)
			{
			// User havent added a security question
			echo '<p style="color:red;">Sikkerhetsspørsmålet er ikke satt, dette er viktig for å ha muligheten til
			å gjennopprette kontoen etter glemt passord eller at kontoen har blitt låst som følger av angrep.</p>';
			}
			/*if (seccheck($mysqli) == true) {
			echo "Sikkerhetsspørsmålet er ikke satt, dette er viktig for å ha muligheten til
			å gjennopprette kontoen etter <br>
			glemt passord eller at kontoen har blitt låst som følger av angrep.";
			}
			else {
				echo "Sikkerhetsspørsmålet er satt";
			}*/
?>

<?php if(@$_GET['action'] == "changed_security_question")
{
echo "<p>Sikkerhetsspørsmålet ditt har blitt endret! </p>";
}
?>
<?php if(@$_GET['action'] == "changed_password")
{
echo "<p><br/><br/><br/><br/>Passordet ditt har blitt endret!</p>";
}
?>
<?php if(@$_GET['action'] == "new_user")
{
echo "<p><br/><br/><br/><br/>En ny bruker har blitt opprettet! </p>";
}
?>


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