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
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
<title>Kontakt</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
 });
</script>
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
    <div class="grid_12">
      <h2 class="inset__1">Finn oss!</h2>
      <div class="map">
        <figure class="">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d67374.31251812285!2d7.966144266196378!3d58.149475125930685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x463802fcf6a52cbf%3A0x654fb6cea880de8f!2sEgsveien+100%2C+4615+Kristiansand!5e0!3m2!1sno!2sno!4v1454326598978" style="border:0"></iframe>
        </figure>
      </div>
    </div>
<?php
	
	if(isset($_POST['update'])){
	$topic = $_POST['teksttopic'];
	$info = $_POST['tekstinfo'];
		$stmt = $mysqli->prepare("UPDATE tekstbokser SET teksttopic = ?, tekstinfo = ?
											WHERE plassering = 'Kontakt'
											LIMIT 1");
		$stmt->bind_param('ss', $topic, $info);  
		$stmt->execute();    // Execute the prepared query.
	}
	if ($stmt =$mysqli->prepare("SELECT teksttopic, tekstinfo
        FROM tekstbokser
		WHERE plassering = 'Kontakt'
        LIMIT 1")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($overskrift, $tekst);
        $stmt->fetch();
		}
	else
	{
		echo " Virket ikke!";
	}
	?>
	
	<?php if (login_check($mysqli) == true) {?>
   <div class="grid_5">
   <form  action="contacts.php" method="POST">
	  <h4 class="color1 inset__1"><?php echo nl2br ($overskrift); ?></h2>
	  <p><font size="4"><?php echo nl2br ($tekst); ?></p></font>
<div class="dropdownIndex">
<submit onclick="myIndexFunction()" class="dropbtnIndex"><font size="3" color="blue" style="text-decoration: underline">Rediger teksten.</font></submit>
  <div id="myDropdownIndex" class="dropdown-contentIndex">
  <table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
  <tr>
  <td>Overskrift</td><td><input type=text size="35%" name="teksttopic" value="<?php echo     $overskrift;?>"></td>
  </tr>
  <tr>
  <td>Informasjon</td><td><textarea name="tekstinfo" rows="10" cols="60"><?php echo $tekst;?>     </textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" name="update" value="Post"></td>
  </tr>
  </table>
  </div>
</div>
			</form>
	  
	  <?php }
	  else{?>
	  
   <div class="grid_5">
      <h4 class="color1 inset__1"><?php echo nl2br ($overskrift); ?></h2>
	  <p><font size="4"><?php echo nl2br ($tekst); ?></p></font>
	<?php }?>
    </div>
    <div class="grid_6 prefix_2">
      <h4 class="color1 inset__1">Kontakt Form</h4>
      <form action='includes/contactmail.php' method='POST' id="contact-form">
          <div class="contact-form-loader"></div>
          <fieldset>
            <label class="name">
              <input type="text" name="name" placeholder="Navn:" required value=""/>
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid name.</span>
            </label>
            <label class="email">
              <input type="text" name="email" placeholder="E-mail:" required value="" />
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid email.</span>
            </label>
            <label class="subject">
              <input type="text" name="subject" placeholder="Tema:" required value="" />
              <span class="empty-message">*This field is required.</span>
              
            </label>
            <label class="message">
              <textarea name="message" placeholder="Melding:" ></textarea>
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*The message is too short.</span>
            </label>
            <label class="submit">
			  <input type='submit' name='send_mail' value='Send Email!'
          </fieldset>
          <div class="modal fade response-message">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                  You message has been sent! We will be in touch soon.
                </div>
              </div>
            </div>
          </div>
        </form>
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