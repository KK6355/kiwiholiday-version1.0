<?php
include "library/config.php";

if(isset($_POST['reviewBooking'])){
    $booking_id = $_POST['booking_id'];
    $house_id = $_POST['house_id'];
    $guest_id = $_POST['guest_id'];
    $star = mysqli_real_escape_string($link, $_POST['star']);
    $comment = mysqli_real_escape_string($link, $_POST['comment']);

    if($star == ""){
        ?>
        <script>
     
        if (confirm( "Rating star can not be empty!")){
         window.location.href = "guestCenter.php?guestId=" + <?=$guest_id;?> 
        } else {
          window.location.href = "guestCenter.php?guestId=" + <?=$guest_id;?>
         }
       
        
          </script>
          <?php
    } else {
        $queryR = "INSERT INTO `review`( `booking_id`, `house_id`, `guest_id`, `comment`, `star`) 
        VALUES ('$booking_id','$house_id','$guest_id','$comment','$star')";
        $resultR = mysqli_query($link, $queryR);
        header("Location: guestCenter.php?guestId=".$guest_id);
    }

}

?>