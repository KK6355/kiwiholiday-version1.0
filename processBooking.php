<?php
include "library/config.php";

if(isset($_POST['processBooking'])){
   $booking_id = $_POST['booking_id'];
   $status_id = $_POST['status_id'];
   $host_id = $_POST['host_id'];
   if ($status_id ==1 ) {
       $queryPb = "UPDATE booking SET status_id = 5 WHERE booking_id = '$booking_id' ";
       $resultPb = mysqli_query($link, $queryPb);
   }
   if ($status_id ==5 ) {
    $queryPb = "UPDATE booking SET status_id = 6 WHERE booking_id = '$booking_id' ";
    $resultPb = mysqli_query($link, $queryPb);
}
if ($status_id ==6 ) {
    $queryPb = "UPDATE booking SET status_id = 3, house_status_id = 2 WHERE booking_id = '$booking_id' ";
    $resultPb = mysqli_query($link, $queryPb);
}



header("Location: hostCenter.php?hostId=".$host_id);

}



?>