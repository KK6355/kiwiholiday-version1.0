<?php
include "../library/config.php"; 


$review_id = $_GET['reviewId'];

$queryR = "DELETE FROM review WHERE review_id = '$review_id'";
$resultR = mysqli_query($link, $queryR);



header("Location: review.php");

?>