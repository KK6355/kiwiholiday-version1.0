<?php 
include "../library/config.php";


$queryG = "SELECT * FROM users WHERE role_id = 1 ";
$resultG = mysqli_query($link, $queryG);
$numG = mysqli_num_rows($resultG);

$queryH = "SELECT * FROM users WHERE role_id = 2 ";
$resultH = mysqli_query($link, $queryH);
$numH = mysqli_num_rows($resultH);

$queryHo = "SELECT * FROM house WHERE status_id = 2 ";
$resultHo = mysqli_query($link, $queryHo);
$numHo = mysqli_num_rows($resultHo);

$queryB = "SELECT * FROM booking WHERE status_id != 4";
$resultB = mysqli_query($link, $queryB);
$numB = mysqli_num_rows($resultB);

$queryR = "SELECT * FROM review";
$resultR = mysqli_query($link, $queryR);
$numR = mysqli_num_rows($resultR);


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
    <?php 
        if(isset( $_SESSION['status']) && $_SESSION['role_id'] == 3 ):
    ?>
    <div class="container">
      <!--top section-->
      <?php include "topSection.php"; ?>
      <!--top section-->
      <div class="row">
          <!--side nav bar-->
          <div class="col col-lg-4  text-end" style="background-color: black;">
            <br>
            <div class="row gy-3" style="font-size: 20px;font-weight:bold;">
                <a href="index.php" style="text-decoration: none;color:#E9BC4B;">Home</a>
                <a href="guest.php" style="text-decoration: none;color:white;">Guest Management</a>
                <a href="host.php" style="text-decoration: none;color:white;">Host Management</a>
                <a href="house.php" style="text-decoration: none;color:white;">House Management</a>
                <a href="booking.php" style="text-decoration: none;color:white;">Booking Management</a>
                <a href="review.php" style="text-decoration: none;color:white;">Review Management</a>
            </div>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
          </div>
          <!--side nav bar-->
          <!--main section-->
          <div class="col col-lg-8 " style="padding-left: 100px;" >
            <div class="row justify-content-start">
                <div class="col">
                    <div class="text-center" style="width: 150px;height:150px;border:#00FFF0 solid 5px;" >
                        <a href="guest.php" style="text-decoration: none;">
                            <br>
                            <br>
                            <h3 style="color: #E9BC4B;" ><b><?=$numG; ?></b></h3>
                            <p style="color: gray;">Guests</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center" style="width: 150px;height:150px;border:#00FFF0 solid 5px;" >
                        <a href="host.php" style="text-decoration: none;">
                            <br>
                            <br>
                            <h3 style="color: #C57055;" ><b><?=$numH; ?></b></h3>
                            <p style="color: gray;">Hosts</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center" style="width: 150px;height:150px;border:#00FFF0 solid 5px;" >
                        <a href="house.php" style="text-decoration: none;">
                            <br>
                            <br>
                            <h3 style="color: #C2E27C;" ><b><?=$numHo; ?></b></h3>
                            <p style="color: gray;">Housese</p>
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row justify-content-start">
                <div class="col-4">
                    <div class="text-center" style="width: 150px;height:150px;border:#00FFF0 solid 5px;" >
                        <a href="booking.php" style="text-decoration: none;">
                            <br>
                            <br>
                            <h3 style="color: #E858BF;" ><b><?=$numB; ?></b></h3>
                            <p style="color: gray;">Bookings</p>
                        </a>
                    </div>
                </div>
               
                <div class="col-4">
                    <div class="text-center" style="width: 150px;height:150px;border:#00FFF0 solid 5px;" >
                        <a href="review.php" style="text-decoration: none;">
                            <br>
                            <br>
                            <h3 style="color:brown" ><b><?=$numR; ?></b></h3>
                            <p style="color: gray;">Reviews</p>
                        </a>
                    </div>
                </div>
                
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
<?php else: ?>
    <script>
     
     if (confirm( "Please Log In As Admin to get Access!")){
      window.location.href = "../index.php";
     } else {
      window.location.href = "../index.php";
     }
      </script>
<?php
endif; 
?>
</body>
</html>