<?php
include "library/config.php"; 

if(isset($_POST['cancelBooking'])){
    $booking_id = $_POST['booking_id'];
    $guest_id = $_POST['guest_id'];
  

    $queryCancel = "UPDATE `booking` SET `status_id`= 4, `house_status_id`= 2 WHERE booking_id = '$booking_id'";
    $resultCancel = mysqli_query($link,$queryCancel);

    header("Location: guestCenter.php?guestId=".$guest_id);
}

?>