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
<?php include("header.php");?>
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
    <div class="grid_5">
      <h4 class="color1 inset__1">Kontakt Info</h4>
      <p>Sørlandet sykehus HF<br>
	  Teknologi og e-helse<br>
	Telefon sentralbord: 03738<br>
	Postadresse <br>
	Pb. 416, 4604 Kristiansand<br>
	Organisasjonsnummer: 983 975 240<br>
	Nettredaktør: Rune N. Jonassen<br>
      E-mail: <a href="mailto:mail@demolink.org">postmottak@sshf.no</a></p>
    </div>
    <div class="grid_6 prefix_1">
      <h4 class="color1 inset__1">Kontakt Form</h4>
      <form id="contact-form">
          <div class="contact-form-loader"></div>
          <fieldset>
            <label class="name">
              <input type="text" name="name" placeholder="Navn:" value="" data-constraints="@Required @JustLetters"  />
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid name.</span>
            </label>
            <label class="email">
              <input type="text" name="email" placeholder="E-mail:" value="" data-constraints="@Required @Email" />
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid email.</span>
            </label>
            <label class="phone">
              <input type="text" name="phone" placeholder="Telefon:" value="" data-constraints="@Required @JustNumbers" />
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid phone.</span>
            </label>
            <label class="message">
              <textarea name="message" placeholder="Melding:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*The message is too short.</span>
            </label>
            <div class="ta__right">
              <a href="#" class="link-1" data-type="reset">Tøm</a>
              <a href="#" class="link-1" data-type="submit">Send</a>
            </div>
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
<?php include("footer.php");?>
</body>
</html>