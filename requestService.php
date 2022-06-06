<?php
include "library/config.php"; 

if(isset($_POST['requestService'])){
    $booking_id = $_POST['booking_id'];
    $guest_id = $_POST['guest_id'];
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $message = mysqli_real_escape_string($link, $_POST['message']);
  
    $queryRs = "INSERT INTO `requested_service`( `email`, `message`, `guest_id`, `booking_id`)
     VALUES ('$email','$message','$guest_id','$booking_id')";
    $resultRs = mysqli_query($link,$queryRs);

    header("Location: guestCenter.php?guestId=".$guest_id);
}

?>