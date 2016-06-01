<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
<title>Open Account</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
		<link rel="stylesheet" href="css/contact-form.css">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/JavaScript" src="js/sha512.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" type="text/css" href="css/change_password.css" />
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
   
		
		<?php
		
	//gets the encrypted id to the user and checks it against the DB
	
	if(isset($_GET['action']))
	{
		if(@$_GET['action'] == "reset")
		{
			$encrypt = mysqli_real_escape_string($mysqli,$_GET['encrypt']);
			$stmt = $mysqli->prepare("SELECT id FROM members where md5(1290*3+id)= ? LIMIT 1");
			$stmt->bind_param('s', $encrypt);
			$stmt->execute();
			$stmt->store_result();
			$stmt->store_result()>=1;
		}
			
		else
		{
				echo 'Invalid key, please try again. <a href="localhost/sshf/login.php">Forget Password?</a>';
		}
		
	}
	// gets the encrypted id to the user and checks it against the DB If the security question also is correct, the loginattempts is deleted and the account is reopened
	elseif(isset($_POST['open_brute']))
	{
			$encrypt = mysqli_real_escape_string($mysqli,$_POST['encrypt']);
			$security_answer=@$_POST['security_answer'];
			
			$stmt = $mysqli->prepare("SELECT id, security_answer FROM members where md5(1290*3+id)= ? LIMIT 1");
			$stmt->bind_param('s', $encrypt);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($id, $answer);
			$stmt->fetch();
			if(count($stmt->store_result())>=1)
			{
				if($security_answer == $answer)
				{
					$stmt = $mysqli->prepare("DELETE from login_attempts  
											WHERE user_id = ?");
					$stmt->bind_param('s', $id);  
					$stmt->execute();    // Execute the prepared query.
					
					echo "Kontoen din har blitt åpnet igjen, vennligst logg inn på nytt.";
					header( "refresh:3; ./login.php" ); //wait for 5 seconds before redirecting
					exit();
					
					
				}
				else
				{
					echo "Sikkerhetssvaret er ikke riktig, prøv igjen.";
				}
			}	
			else 
			{
			echo "The form did not get sent.";
			return false;
			}
		
	}
	else 
	{
        
		echo "Form did not get submitted";
           return false;
    }
		?>
		<!-- form for the reopening of the account -->
			Fyll inn sikkerhetssvaret for å åpne kontoen din igjen.
			
			<form action='open_brute.php?encrypt=<?php echo "$encrypt";?>' method='POST'><center>
			Svar på sikkerhetsspørsmål:<input type='text' name='security_answer' id='security_answer'><br> 
			<input type='hidden' name='encrypt' value="<?php echo "$encrypt";?>"/>
			<br/>
			<input type='submit' name='open_brute' value='Åpne kontoen igjen!' 
			onclick="formhash(this.form, this.form.security_answer, 'security_answer');"><br />
			
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
</html>

            
