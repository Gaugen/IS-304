<?php

session_start();
$_SESSION['test'] = rand(0,1000);
header('Location: /session_test/itpays2.php');

?>
