<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<html>
    <!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="http://www.sshf.no/style%20library/images/favicon.ico?rev=23">
<title>Grafer</title>
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

<form action="test.php?action=graph" method="POST">
			<table <div class="containerpost" border=0 align="center" bgcolor=#d0d7e9>
			<tr><td colspan=3>Forbruk Engangsglass</td></tr>
			<tr>
			<td>Hvor mange engangsglass bruker du til dagen?</td><td><input type="int" size="35%" name="number"></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" name="submit" value="Se graf"></td>
			</tr>
			</table>
			</form>
			
<?php if(@$_GET['action'] == "graph")
{
$number= intval($_POST['number']);
echo '<img src="graphs/engangsglass.php?n='.$number.'"/>';
}
?>
    

   
 </div>
</section>
<!--==============================
              footer
=================================-->
<?php include("headerfooter/footer.php");?>
</body>
</html>