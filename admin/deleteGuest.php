<?php
include "../library/config.php"; 


$user_id = $_GET['userId'];

$queryB = "DELETE FROM booking WHERE guest_id = '$user_id'";
$resultB = mysqli_query($link, $queryB);

$queryR = "DELETE FROM review WHERE guest_id = '$user_id'";
$resultR = mysqli_query($link, $queryR);


$query = "DELETE FROM users WHERE user_id = '$user_id'";
mysqli_query($link, $query);




header("Location: guest.php");

?>