<?php 
include "../library/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Vicky Kang">
    <meta name="keyword" content="holiday house, holiday accomdation">   
    <title>Kiwi Holiday Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    

</head>
<body>
    
    <div class="container">
      <!--top section-->
      <?php include "topSection.php"; ?>
      <!--top section-->
      <div class="row">
          <!--side nav bar-->
          <div class="col col-lg-4  text-end" style="background-color: black;">
            <br>
            <div class="row gy-3" style="font-size: 20px;font-weight:bold;">
                <a href="index.php" style="text-decoration: none;color:white;">Home</a>
                <a href="guest.php" style="text-decoration: none;color:white;">Guest Management</a>
                <a href="host.php" style="text-decoration: none;color:white;">Host Management</a>
                <a href="house.php" style="text-decoration: none;color:white;">House Management</a>
                <a href="booking.php" style="text-decoration: none;color:white;">Booking Management</a>
                <a href="review.php" style="text-decoration: none;color:#E9BC4B;">Review Management</a>
            </div>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
          </div>
          <!--side nav bar-->
          <!--main section-->
          <div class="col col-lg-8 " style="padding-left: 50px;" >
            <div class="row">
              <div class="col text-start">
                <h4><b>Customer Review Overview</b></h4>
              </div>  
            </div>
            <br>
            <div class="row">
            <table  class="table table-hover text-center " style="font-size: 12px;">
              <thead style="background-color:black;color:white;">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Booking_id</th>
                  <th scope="col">House_id</th>
                  <th scope="col">Guest_id</th>
                  <th scope="col">Comment</th>
                  <th scope="col">Rating</th>
                  <th scope="col">Time</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $queryR = "SELECT * FROM review";
              $resultR = mysqli_query($link, $queryR);
              while($rowR = mysqli_fetch_array($resultR)){
                  extract($rowR);
                  $review_id = $rowR['review_id'];
                  $booking_id = $rowR['booking_id'];
                  $house_id = $rowR['house_id'];
                  $guest_id = $rowR['guest_id'];
                  $comment = $rowR['comment'];
                  $star = $rowR['star'];
                  $time = $rowR['review_date'];
              ?>
                <tr>
                  <th scope="row"><?= $review_id; ?></th>
                  <td><?= $booking_id; ?></td>
                  <td><?= $house_id; ?></td>
                  <td><?= $guest_id; ?></td>
                  <td><?= $comment; ?></td>
                  <td>
                  <?php
                    for($i=0; $i<$star; $i++) {
                    ?>
                    <span style="color:gold;"><i class="fas fa-star"></i></span>
                    <?php
                    }
                    ?>
                  </td>
                  <td><?= $time; ?></td>
                  <td>
                    <a href="javascript:deleteReview(<?= $review_id; ?>)" title="delete">
                      <span style="color: #C57055;"><i class="fas fa-times"></i></span>
                    </a>
                  </td>
                </tr>
              <?php
              }
              ?>
              </tbody>      
            </table>
            </div>  
           
          </div>
          <!--main section-->
           
      </div>
      <!--footer-->
      <?php include "footer.php"; ?>
      <!--footer-->
     
     
     

      

    </div>



















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script>
function deleteReview(review_id) {
  if (confirm("Are you sure you want to delete this review?")) {
    window.location.href = "deleteReview.php?reviewId=" + review_id;
  }

}  
</script>
</body>
</html>