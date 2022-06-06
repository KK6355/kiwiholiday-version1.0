<?php
date_default_timezone_set('Pacific/Auckland');
session_start();
$server = "localhost";
$user = "root";
$password = "";
$database = "kiwiholiday_db";
$link = mysqli_connect($server, $user, $password, $database);

define('HOUSE_IMG', 'c:/xampp/htdocs/kiwiholiday/upload/');
define('HOUSE_IMG_WIDTH', 800);
?>