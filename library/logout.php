<?php
include "config.php";

if ($_SESSION['status']){
    session_destroy();
}

header("Location: ../index.php");



?>