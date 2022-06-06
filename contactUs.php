<?php
include "library/config.php"; 

if(isset($_POST['contactUs'])){
   
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $message = mysqli_real_escape_string($link, $_POST['message']);
  
    $queryC = "INSERT INTO `contact`( `email`, `message`)
     VALUES ('$email','$message')";
    $resultC = mysqli_query($link,$queryC);

    header("Location: aboutUs.php");
}

?>