<?php
if (empty($_SESSION['some_counter'])) {
    $_SESSION['some_counter'] = 0;
}

echo $_SESSION['some_counter']++;
?>