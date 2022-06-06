<?php 
include "../library/config.php";

$currentDay = date("Y-m-d");

if(isset($_POST['addBooking'])){
  
    $house_id = mysqli_real_escape_string($link, $_POST['house_id']);
    $guest_id = mysqli_real_escape_string($link, $_POST['guest_id']);
    $check_in = mysqli_real_escape_string($link, $_POST['check_in']);
    $check_out = mysqli_real_escape_string($link, $_POST['check_out']);
    $guest_num = mysqli_real_escape_string($link, $_POST['guest_num']);
    $guest_name = mysqli_real_escape_string($link, $_POST['guest_name']);
    $pet = mysqli_real_escape_string($link, $_POST['pet']);
    $credit_card_number = mysqli_real_escape_string($link, $_POST['credit_card_number']);
    $payment_id = mysqli_real_escape_string($link, $_POST['payment_id']);
    

    //check exist booking with house_id
$queryA = "SELECT * FROM booking WHERE house_id = '$house_id'AND status_id != 4  ";
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
  

      


      else {
        $queryB = "INSERT INTO `booking`( `guest_id`, `house_id`, `check_in`, `check_out`, `guest_num`, `pet`, `guest_name`, `payment_id`,`credit_card_number`, `status_id`,`house_status_id`) 
        VALUES ('$guest_id','$house_id','$check_in','$check_out','$guest_num','$pet','$guest_name','$payment_id','$credit_card_number',1,1)";
        $resultB = mysqli_query($link, $queryB);

    header("Location: booking.php?");
}
}
}

?>