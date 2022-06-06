<?php
include "../library/config.php"; 

$image_id = $_GET['imageId'];
$query = "DELETE FROM gallery WHERE image_id = '$image_id'";
mysqli_query($link, $query);
header("Location: house.php");
?>