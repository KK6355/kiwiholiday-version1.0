<?php
include "../library/config.php"; 

//delete all houses under this host
$user_id = $_GET['userId'];
$queryH = "DELETE FROM house WHERE host_id = '$user_id'";
mysqli_query($link, $queryH);
//then delete host
$query = "DELETE FROM users WHERE user_id = '$user_id'";
mysqli_query($link, $query);




header("Location: host.php");

?>