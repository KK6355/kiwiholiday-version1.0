<?php 
include "../library/config.php";

$currentDay = date("Y-m-d");

if(isset($_POST['editBooking'])){
    $booking_id = $_POST['booking_id'];
    $house_id = $_POST['house_id'];
    $guest_max = $_POST['guest_max'];
    $check_in = mysqli_real_escape_string($link, $_POST['check_in']);
    $check_out = mysqli_real_escape_string($link, $_POST['check_out']);
    $guest_num = mysqli_real_escape_string($link, $_POST['guest_num']);
    $guest_name = mysqli_real_escape_string($link, $_POST['guest_name']);
    $pet = mysqli_real_escape_string($link, $_POST['pet']);
    $credit_card_number = mysqli_real_escape_string($link, $_POST['credit_card_number']);
    $payment_id = mysqli_real_escape_string($link, $_POST['payment_id']);
    $status_id = mysqli_real_escape_string($link, $_POST['status_id']);

    //check exist booking with house_id
$queryA = "SELECT * FROM booking WHERE house_id = '$house_id'AND status_id != 4 AND booking_id != '$booking_id' ";
$resultA = mysqli_query($link, $queryA);
$record_num = mysqli_num_rows($resultA);
$rowsE = mysqli_fetch_all($resultA, MYSQLI_ASSOC);//get  all the matched rows.
foreach ($rowsE as $rowE){
  $check_in_exist = $rowE['check_in'];
  $check_out_exist = $rowE['check_out'];
} 

    if ($check_in == "" || $check_out == "" || $check_in >= $check_out || $check_in < $currentDay ){
        ?>
        <script>
       
       if (confirm( "Please Select Correct Check In and Check Out Date!")){
        window.location.href = "booking.php?"  
       } else {
        window.location.href = "booking.php?"  
       }
        </script>

  <?php 
  } 
  
  
  else{
      if($record_num > 0 && ($currentDay <= $check_in_exist || $currentDay <= $check_out_exist) && ($check_out >= $check_in_exist AND $check_in <= $check_out_exist )) {
        ?>
        <script>
       
       if (confirm( "Not Available! Please Check Availablity!")){
        window.location.href = "booking.php?"   
       } else {
        window.location.href = "booking.php?"  
       }
        </script>
  <?php
      }
      if($guest_num > $guest_max) {
        ?>
        <script>
       
       if (confirm( "Please input correct guest number!")){
        window.location.href = "booking.php?"   
       } else {
        window.location.href = "booking.php?"  
       }
        </script>
  <?php
      }


      else {

    $queryE = "UPDATE `booking` SET  `check_in`= '$check_in' , `check_out`= '$check_out' ,
    `status_id`= '$status_id' ,`guest_num`='$guest_num',`pet`='$pet',`guest_name`='$guest_name',`credit_card_number`='$credit_card_number',`payment_id`='$payment_id' WHERE booking_id = '$booking_id'";
    $resultE = mysqli_query($link,$queryE);

    header("Location: booking.php?");
}
}
}

?>