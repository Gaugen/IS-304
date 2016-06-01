<?php
//connects to DB with the configuration of the db_config file
include_once 'db_config.php';   
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);