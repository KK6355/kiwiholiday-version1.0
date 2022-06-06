<?php
include "../library/config.php"; 


$booking_id = $_GET['bookingId'];

$queryB = "DELETE FROM booking WHERE booking_id = '$booking_id'";
$resultB = mysqli_query($link, $queryB);




header("Location: booking.php");

?>