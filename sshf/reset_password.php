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
<title>Reset password</title>
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
		
	
	//finds id to user based on the enctrypted id the user recieved from the resetmail
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
	//Checks sequrity answer to the user, if its ok the new password is set 
	elseif(isset($_POST['reset_password']))
	{
			$encrypt = mysqli_real_escape_string($mysqli,$_POST['encrypt']);
			$new=@$_POST['new_password'];
			$confirm=@$_POST['confirm_password'];
			$security_answer=@$_POST['security_answer'];
			
			$stmt = $mysqli->prepare("SELECT id, salt, security_answer FROM members where md5(1290*3+id)= ? LIMIT 1");
			$stmt->bind_param('s', $encrypt);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($id, $salt, $answer);
			$stmt->fetch();
			if(count($stmt->store_result())>=1)
			{
				if($security_answer == $answer)
				{
					if($new == $confirm)
					{
					
						$stmt = $mysqli->prepare("UPDATE members SET password = ?
												WHERE id = ?
												LIMIT 1");
						$stmt->bind_param('ss', hash('sha512', $new . $salt), $id);  
						$stmt->execute();    // Execute the prepared query.

						echo "Passordet har blitt endret, vennligst logg inn på nytt.";
						header( "refresh:3; ./index.php" ); //wait for 3 seconds before redirecting
						exit();
					}
					else
					{
						echo "De to passordene stemmer ikke, vennligst kontakt server administrator.";
						return false;
					}
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
			<ul>
			<li>Passordet må være minst 6 karakterer langt</li>
            <li>Passordet må inneholde:
                <ul>
                    <li>Minst en stor bokstav(A..Å)</li>
                    <li>Minst en liten bokstav(a..å)</li>
                    <li>Minst et tall(0..9)</li>
                </ul>
            </li>
        </ul>
        </ul><br/><br/>
			<!-- form for new password -->
			<form action='reset_password.php?encrypt=<?php echo "$encrypt";?>' method='POST'><center>
			Svar på sikkerhetsspørsmål:<input type='text' name='security_answer' id='security_answer'><br>
			Nytt Passord: <input type='password' name='new_password' id="new_password" onkeyup='check()'><br/>
			Gjenta Passord: <input type='password' name='confirm_password' id="confirm_password" onkeyup='check()' > 
			<br/><span id='message'></span><br/>
			<input type='hidden' name='encrypt' value="<?php echo "$encrypt";?>"/>
			<br/>
			<input type='submit' name='reset_password' value='Reset Password!' 
			onclick="passcheck(this.form, this.form.new_password, 'new_password');
			passcheck(this.form, this.form.confirm_password, 'confirm_password');
			formhash(this.form, this.form.security_answer, 'security_answer');"><br />
			
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

            
