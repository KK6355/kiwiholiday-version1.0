<?php
include "library/config.php"; 

$queryT = "SELECT * FROM booking WHERE booking_id = '$booking_id'";
$resultT = mysqli_query($link, $queryT);
$rowT = mysqli_fetch_array($resultT);
$time = $rowT['time'];



$bookedTime = new DateTime("$time");

$interval->days = 3;

$interval = $bookedTime -> diff($timeLimit);

$timeLimit = new DateTime("$newTime");

echo $newTime;

if(isset($_POST['cancelBooking'])){
    $booking_id = $_POST['booking_id'];
    $guest_id = $_POST['guest_id'];
  

    $queryCancel = "UPDATE `booking` SET `status_id`= 4, `house_status_id`= 2 WHERE booking_id = '$booking_id'";
    $resultCancel = mysqli_query($link,$queryCancel);

 
}

?>