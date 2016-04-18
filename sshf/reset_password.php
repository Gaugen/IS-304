<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
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
	elseif(isset($_POST['reset_password']))
	{
			$encrypt = mysqli_real_escape_string($mysqli,$_POST['encrypt']);
			$new=@$_POST['new_password'];
			$confirm=@$_POST['confirm_password'];
			
			$stmt = $mysqli->prepare("SELECT id, salt FROM members where md5(1290*3+id)= ? LIMIT 1");
			$stmt->bind_param('s', $encrypt);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($id, $salt);
			$stmt->fetch();
			if(count($stmt->store_result())>=1)
			{
				if($new == $confirm){
					
					$stmt = $mysqli->prepare("UPDATE members SET password = ?
											WHERE id = ?
											LIMIT 1");
					$stmt->bind_param('ss', hash('sha512', $new . $salt), $id);  
					$stmt->execute();    // Execute the prepared query.

					echo "Your password has been changed, please log in again.";
					header( "refresh:3; ./index.php" ); //wait for 5 seconds before redirecting
					exit();
				}
				else
				{
					echo "The two passwords are not the same. Please contact the server administrator.";
					return false;
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
        
		echo "Form did not get submitted?";
           return false;
    }
		?>
			<ul>
			<li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain:
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
        </ul><br/><br/>
			
			<form action='reset_password.php?encrypt=<?php echo "$encrypt";?>' method='POST'><center>
			New password: <input type='password' name='new_password' id="new_password" onkeyup='check()'><br/>
			Confirm password: <input type='password' name='confirm_password' id="confirm_password" onkeyup='check()' > 
			<br/><span id='message'></span><br/>
			<input type='hidden' name='encrypt' value="<?php echo "$encrypt";?>"/>
			<br/>
			<input type='submit' name='reset_password' value='Reset Password!' 
			onclick="passcheck(this.form, this.form.new_password, 'new_password');return passcheck(this.form, this.form.confirm_password, 'confirm_password');">
			<br />
			
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

            
