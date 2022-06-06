<?php
include "library/config.php"; 

$image_id = $_GET['imageId'];
$host_id = $_GET['hostId'];
$query = "DELETE FROM gallery WHERE image_id = '$image_id'";
mysqli_query($link, $query);
header("Location: hostCenter.php?hostId=".$host_id);
?>