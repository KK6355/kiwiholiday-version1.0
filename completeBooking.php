<?php
include "library/config.php"; 

if(isset($_POST['confirmBooking'])){
    $booking_id = $_POST['booking_id'];
    $guest_id = $_POST['guest_id'];
    $guest_max = $_POST['guest_max'];
    $guest_num = mysqli_real_escape_string($link, $_POST['guest_num']);
    $guest_name = mysqli_real_escape_string($link, $_POST['guest_name']);
    $pet = mysqli_real_escape_string($link, $_POST['pet']);
    $credit_card_number = mysqli_real_escape_string($link, $_POST['credit_card_number']);
    $payment_id = mysqli_real_escape_string($link, $_POST['payment_id']);

    if($guest_num > $guest_max) {
        ?>
        <script>
       
       if (confirm( "Please input correct guest number!")){
        window.location.href = "guestCenter.php?guestId=" + <?=$guest_id; ?>   
       } else {
        window.location.href = "guestCenter.php?guestId=" + <?=$guest_id; ?>  
       }
        </script>
  <?php
      }
    else{
    $queryC = "UPDATE `booking` SET 
    `status_id`= 1,`guest_num`='$guest_num',`pet`='$pet',`guest_name`='$guest_name',`credit_card_number`='$credit_card_number',`payment_id`='$payment_id' WHERE booking_id = '$booking_id'";
    $resultC = mysqli_query($link,$queryC);

    header("Location: guestCenter.php?guestId=".$guest_id);
}
}

?>