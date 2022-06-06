<?php 
include "library/config.php";
$error_email = "";
$error_password = "";


$currentDay = date("Y-m-d");
$house_id = $_GET['houseId'];
//query house detail
$queryH = "SELECT * FROM house WHERE house_id = '$house_id'";
$resultH = mysqli_query($link, $queryH);
$rowH = mysqli_fetch_assoc($resultH);
extract($rowH);
$image_main = $rowH['image_main'];
$host_id = $rowH['host_id'];
$title = $rowH['title'];
$address = $rowH['address'];
$guest_num = $rowH['guest_num'];
$bedroom_num = $rowH['bedroom_num'];
$livingroom_num = $rowH['livingroom_num'];
$toilet_num = $rowH['toilet_num'];
$shower_num = $rowH['shower_num'];
$parking_num = $rowH['parking_num'];
$pet = $rowH['pet'];
$wifi = $rowH['wifi'];
$kitchen = $rowH['kitchen'];
$tv= $rowH['tv'];
$price = $rowH['price'];

//query host name
$queryHost = "SELECT * FROM users WHERE user_id = '$host_id'";
$resultHost = mysqli_query($link, $queryHost);
$rowHost = mysqli_fetch_assoc($resultHost);
extract($rowHost);
$name = $rowHost['name'];

//query review
$star_total = 0;
$queryR = "SELECT * FROM review WHERE house_id = '$house_id'";
$resultR = mysqli_query($link, $queryR);
$review_num = mysqli_num_rows($resultR);

$queryS = "SELECT * FROM review WHERE house_id = '$house_id' ";
$resultS = mysqli_query($link, $queryS);
$rowsS = mysqli_fetch_all($resultS, MYSQLI_ASSOC);//get  all the matched rows.

foreach ($rowsS as $rowS){
  $star = $rowS['star'];
 
  $star_total += $star;
 
}
if ($review_num != 0){
  $star_ave = $star_total/$review_num;
} else {
  $star_ave = 5;
}







//check exist booking with house_id
$queryA = "SELECT * FROM booking WHERE house_id = '$house_id'AND status_id != 4  ";
$resultA = mysqli_query($link, $queryA);
$record_num = mysqli_num_rows($resultA);
$rowsE = mysqli_fetch_all($resultA, MYSQLI_ASSOC);//get  all the matched rows.
foreach ($rowsE as $rowE){
  $check_in_exist = $rowE['check_in'];
  $check_out_exist = $rowE['check_out'];
} 



//add booking
if(isset($_POST['addBooking'])){
  $check_in = $_POST['check_in'];
  $check_out = $_POST['check_out'];

  if(!isset($_SESSION['status'])){
   
      ?>
      <script>
     
    if (confirm( "Please Log In From Top Icon Firstly!")){
     window.location.href = "houseDetail.php?houseId=" + <?=$house_id;?> 
    } else {
      window.location.href = "houseDetail.php?houseId=" + <?=$house_id;?> 
     }
   
    
      </script>
<?php
  } else {
    if ($check_in == "" || $check_out == "" || $check_in >= $check_out || $check_in < $currentDay ){
      ?>
      <script>
     
     if (confirm( "Please Select Correct Check In and Check Out Date!")){
      window.location.href = "houseDetail.php?houseId=" + <?=$house_id;?> 
     } else {
      window.location.href = "houseDetail.php?houseId=" + <?=$house_id;?> 
     }
      </script>
<?php
    } else {
       

      if($record_num > 0 && ($currentDay <= $check_in_exist || $currentDay <= $check_out_exist) && ($check_out >= $check_in_exist AND $check_in <= $check_out_exist )){
        ?>
        <script>
       
       if (confirm( "Not Available! Please Check Availablity!")){
        window.location.href = "houseDetail.php?houseId=" + <?=$house_id;?> 
       } else {
        window.location.href = "houseDetail.php?houseId=" + <?=$house_id;?> 
       }
        </script>
  <?php
      }else {
        $guest_id =  $_SESSION['user_id'];
        $queryB = "INSERT INTO `booking`( `guest_id`, `house_id`, `check_in`, `check_out`, `status_id`, `house_status_id`) VALUES
         ('$guest_id','$house_id',' $check_in',' $check_out', 2, 1)";
        $resultB = mysqli_query($link, $queryB);
        header("Location: guestCenter.php?guestId=".$guest_id);
      }
  
   
      


      
    }
  }
  

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Vicky Kang">
    <meta name="keyword" content="holiday house, holiday accomdation">   
    <title>Welcome to KiwiHoliday</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/myStyle2.css"  />
    <link rel="stylesheet" href="css/magnific-popup.css"  />

</head>
<body>
<div>
  <div class="container">  
    <div id="mainSection">
        <!-----Top Nav Bar----->
        <div id="topNavi" style="color: black;font-weight:bold;">

          <ul class="nav justify-content-center">
              <img src="image/logo.png" style="padding-right: 250px;height:100%;">
              <li class="nav-item">
                 <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  active" href="houseListing.php">Book a holiday house</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutUs.php">Kiwi Holiday</a>
              </li>
              <div class="col text-end dropdown" style="padding-left:150px;padding-top:20px;">
                <a class="btn dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" >
                <span style="font-size: 30px;color:#00FFF0;">
                  <i class="fas fa-user-circle"></i>
                </span>
                </a>
                
                <?php include "sessionToggle.php"; ?>
                
              </div>
          </ul>   
        </div>
        <br><br><br>
        <!-----Top Nav Bar ends----->
        <!--House detail display-->
        <div class="row">
            <h4><b><?= $title; ?></b></h4>
        </div>
        <br>
        <!--image display-->
        <div class="row gx-1">
            <div class="col-6 ">
                <div class="position-relative ">
                  <img src="upload/<?=$image_main; ?>" width="640">
                  <div class="position-absolute top-0 start-0">
                  <!--edit favourite funtion-->
                 <form method="POST" action="editFavD.php" >
                   <input type="hidden" name="house_id" value="<?=$house_id; ?>">
                   <input type="hidden" name="this_fav_num" value="<?php 
                    $guest_id = $_SESSION['user_id'];
                    $queryF = "SELECT * FROM favourite WHERE house_id = '$house_id' AND guest_id = '$guest_id' ";
                    $resultF = mysqli_query($link, $queryF);
                    $this_fav_num = mysqli_num_rows($resultF);
                    echo $this_fav_num;
                   ?>">
                   <button type="submit" name="editFav" style="background-color:transparent; border:none;">
                     <span style="font-size:25px;color:#00FFF0;">
                       <?php if($this_fav_num == 0): ?>
                       <i class="far fa-heart"></i>
                       <?php else: ?>
                       <i class="fas fa-heart"></i>
                       <?php endif; ?>
                     </span>
                   </button>
                 </form>    
                 <!--edit favourite funtion-->
                  </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row gy-1 gx-1">
                    <?php 
                     $queryG = "SELECT * FROM gallery WHERE house_id = '$house_id'";
                     $resultG = mysqli_query($link, $queryG);
                     while ($rowG = mysqli_fetch_array($resultG)){
                       $image = $rowG['image'];
                     ?>
                    <div class="col-6">
                       <!--JQuery light box plugin here-->  
                       <a class="image-link" href="upload/<?= $image; ?>" >
                          <img src="upload/<?= $image; ?>" width="320"> 
                       </a>
                       <!--JQuery light box plugin here-->  
                    </div>
                    <?php 
                     }
                     ?>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-3">
            <p>
                Hosted By &nbsp;<b><?= $name; ?></b>&nbsp;
                <span style="color:#00FFF0;"><i class="fas fa-check-double"></i></span>
                Verified Host
            </p>
          </div>
          <div class="col-3">
            <p>
                <b><?=$star_ave;?></b>&nbsp;
                <span style="color:gold;"><i class="fas fa-star"></i></span>
            </p>
          </div>   
        </div>
        <div class="row">
          <p><span style="color:red;font-size:30px;"><i class="fas fa-map-marker-alt"></i></span>
            &nbsp;<?= $address; ?>   
          </p>
        </div>
        <br>
        <!--image display ends-->
        <div class="row">
            <div class="col-9 ">
                <div class="row">
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-user-friends"></i> </span>&nbsp;<?= $guest_num;?>
                    </div>
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-dog"></i></span>&nbsp;<?= $pet;?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-bed"></i></span>&nbsp;<?= $bedroom_num;?>
                    </div>
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-couch"></i></span>&nbsp;<?= $livingroom_num;?>
                    </div>
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-concierge-bell"></i></span>&nbsp;<?= $kitchen;?>
                    </div>
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-shower"></i></span>&nbsp;<?= $shower_num;?>
                    </div>
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-toilet"></i></span>&nbsp;<?= $toilet_num;?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-wifi"></i></span>&nbsp;<?= $wifi;?>
                    </div>
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-parking"></i></span>&nbsp;<?= $parking_num;?>
                    </div>
                    <div class="col-2">
                      <span style="font-size: 25px;"><i class="fas fa-tv"></i></span>&nbsp;<?= $tv;?>
                    </div>
                </div>
                <br><br><br><br>
                <div class="row">
                    <div class="col"><p style="color: gray;font-size:12px;">***Self Check-in Available***</p></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col"><p style="font-size:20px;"><?=$review_num; ?>&nbsp;review(s)</p></div>
                </div>
                <?php
                while ($rowR = mysqli_fetch_array($resultR) ){
                  $guest_id = $rowR['guest_id'];
                  $comment = $rowR['comment'];
                  $review_date = $rowR['review_date'];
                  $star = $rowR['star'];

                  $queryU = "SELECT * FROM users WHERE user_id = '$guest_id'";
                  $resultU = mysqli_query($link, $queryU);
                  $rowU = mysqli_fetch_array($resultU);
                  extract($rowU);
                  $name = $rowU['name'];

                ?>
                <div class="row">
                  <div class="col">
                    <h6><b><?= $name; ?>:</b>
                    
                    <?php
                    for($i=0; $i<$star; $i++) {
                    ?>
                    <span style="color:gold;"><i class="fas fa-star"></i></span>
                    <?php
                    }
                    ?>
                    </h6><p style="font-size:12px;color:gray;"><?=$review_date; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    "<?= $comment; ?>"
                  </div>
                </div>
                <br>
                <?php  
                }
                ?>
            </div>
            <div class="col-3">
                <div class="row">
                  <h5 style="color:#00FFF0;">
                     <b>$<?=$price; ?>NZD / Night</b>
                     &nbsp;
                     
                        <a class="btn" data-bs-toggle="collapse" href="#checkAva" role="button" aria-expanded="false" aria-controls="checkAva" title="check availability">
                         <span style="color: red;">
                           <i class="fas fa-exclamation-circle"></i>
                         </span>
                        </a>
                        <!--availability display -->
                        <div class="collapse" id="checkAva">
                          <br>
                          <div class="card card-body">
                              <div class="row">
                                <div class="col">
                                  <p style="color:black;font-size:15px;">This house has been booked on these days :</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <?php
                                   $queryA = "SELECT * FROM booking WHERE house_id = '$house_id'AND status_id != 4 ORDER BY check_in   ";
                                   $resultA = mysqli_query($link, $queryA);
                                   $record_num = mysqli_num_rows($resultA);

                                   if ($record_num > 0){
                                   while ($rowA = mysqli_fetch_array($resultA)){
                                     $check_in = $rowA['check_in'];
                                     $check_out = $rowA['check_out'];
                                     

                                     if ($currentDay <= $check_in || $currentDay <= $check_out ):
                                    
                                  ?>
                                   <p style="color:black;font-size:15px;">
                                   <?php echo $check_in. "~" . $check_out; ?>;
                                   </p> 
                                   <?php endif;?>
                                   <?php 
                                  }
                                  ?>
                                  <?php if($currentDay > $check_out): ?><p style="color:black;font-size:15px;">No Upcoming Booking!</p><?php endif;?>
                                 
                                
                                  <?php
                                  } else {
                                  ?>
                                  <p style="color:black;font-size:15px;">No Record!</p>
                                  <?php
                                  }
                                  ?>
                                </div>
                              </div>
                          </div>
                        </div>
                        <!--availability display -->
                     
                  </h5>
                </div>
                <br>
                <form method="POST" >
                  <div class="row">
                    <div class="col">
                      <label class="form-label" for="check_in"><b>Check In:</b></label>
                      <input type="date" class="form-control" name="check_in" > 
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col">
                      <label class="form-label" for="check_out"><b>Check Out: </b></label>
                      <input type="date" class="form-control" name="check_out" >
                    </div> 
                  </div>
                  <br>
                  <div class="row">
                    <div class="col">
                      <button type="submit" class="btn" name="addBooking" style="background:#00FFF0;color:white;width:100%;"><b>Book Now</b></button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
        <!--House detail display ends-->
   
        
        <!-----footer----->
        <?php include "footer.php"; ?>
        <!-----footer----->


    </div>
  </div>  
</div>
















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="js/jquery.magnific-popup.min.js"></script>
<script>
    //light box plugin
$(document).ready(function() {
  $('.image-link').magnificPopup({
    type:'image',
    gallery:{
    enabled:true
  }
  });
});
</script>

</body>
</html>