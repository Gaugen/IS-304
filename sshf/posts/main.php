<?php

//show information
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<html>
<head>
<!--> Style and stylesheets from css <-->
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<title>Newsfeed</title>
<body>
<!--> storeinfo to save newsposts in db <-->
<form enctype="multipart/form-data" action="storeinfo.php" method="POST">

<table>
<tr><td colspan=2><h2>&nbsp</h2></td></tr>
</table>


<table <div class=containerpost border=0 align=center bgcolor=#d0d7e9>
<tr><td colspan=3><h1>Nyheter</h1></td></tr>
<tr>

<!--> Post functions with text areas and post option - also to add picture <-->
<td>Tema</td><td><input type=text size="35%" name="newstopic"></td>
</tr>
<tr>
<td>Informasjon</td><td><textarea name="newsinfo" id="newsinfo" rows="10" cols="60"></textarea></td>
</tr>
<tr>
<td>Bilde</td><td><input type=file name="newsphoto"></td>
</tr>
<tr>
<td></td><td><input type=submit name="submit" value="Post"></td>
</tr>
</table>
</form>

<?php

//Function to delete post
if (isset($_POST['delete'])){
	$DeleteQuery = "DELETE FROM post WHERE newstopic='$_POST[hidden]'";
	mysqli_query($mysqli, $DeleteQuery);
};



$q = "SELECT * FROM post";
$r = mysqli_query($mysqli, "$q");
if($r)
{
	//Run show.php and get other external input to handle posts
while($row=mysqli_fetch_array($r)){ 
	echo "<form action=show.php method=post>";
	echo "<div class=container>";
	echo "<div class=newsheader>";
	echo "<h2>";
	echo $row['newstopic'];
	echo "</h2>";
	echo "</div>";
	echo "<img src=image.php?newsno=".$row['newsno']." width=150 height=150/>";
	echo "<div class=tb2>";
	echo $row['newsinfo'];
	echo "</div>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $row['newstopic'] . " </td>";
	echo "<div class=newsfooter>";
	echo "<td>" .  "<input type=submit name=delete value=Delete>" . "</td>";
	echo "</div>";
	echo "</div>";
	echo "</br>";
	echo "</form>";
}


}

else
{
echo mysqli_error($mysqli);
}
?>

</body>
</html>