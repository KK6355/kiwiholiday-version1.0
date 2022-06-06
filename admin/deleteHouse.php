<?php
include "../library/config.php"; 

$house_id = $_GET['houseId'];
$currentDay = date("Y-m-d");

//check future booking under this house
$queryB = "SELECT * FROM booking WHERE house_id = '$house_id'AND status_id != 4  ";
$resultB = mysqli_query($link, $queryB);
$booking_num = mysqli_num_rows($resultB);
$rowsB = mysqli_fetch_all($resultB, MYSQLI_ASSOC);//get  all the matched rows.
foreach ($rowsB as $rowB){
  $check_in_exist = $rowB['check_in'];
  $check_out_exist = $rowB['check_out'];
} 

if($booking_num > 0 && ($currentDay <= $check_in_exist || $currentDay <= $check_out_exist) ){
    ?>
        <script>
       
       if (confirm( "Action declined, future booking under this house!")){
        window.location.href = "house.php?" 
       } else {
        window.location.href = "house.php?" 
       }
        </script>

  <?php 

} else{



$query = "DELETE FROM house WHERE house_id = '$house_id'";
mysqli_query($link, $query);
header("Location: house.php");
}



?>