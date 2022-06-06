<?php 
include "library/config.php";
$error_email = "";
$error_password = "";

$queryHc = "SELECT * FROM house WHERE  location_id = 1";
$resultHc = mysqli_query($link,$queryHc);
$numC = mysqli_num_rows($resultHc);

$queryHq = "SELECT * FROM house WHERE  location_id = 2";
$resultHq = mysqli_query($link,$queryHq);
$numQ = mysqli_num_rows($resultHq);

$queryHl = "SELECT * FROM house WHERE  location_id = 3";
$resultHl = mysqli_query($link,$queryHl);
$numL = mysqli_num_rows($resultHl);

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
    <link rel="stylesheet" href="css/myStyle.css"  />

</head>
<body>
<div>
  <div class="container">  
    <div id="topBox">
        <!-----Top Nav Bar----->
        <div id="topNavi" style="font-weight:bold;">

            <ul class="nav justify-content-center">
                <img src="image/logo.png" style="padding-right: 250px;height:100%;">
                <li class="nav-item">
                    <a class="nav-link  active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="houseListing.php">Book a holiday house</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutUs.php">Kiwi Holiday</a>
                </li>
                <!-----session section----->
                <?php include "sessionSection.php"; ?>
                <!-----session section----->
            </ul>   
        </div>
        <!-----Top Nav Bar----->
        <!-----Main Banner----->
        <div class="text-center imgContainer">
            <img src="image/indexBanner.jpg"  class="img-fluid rounded" style="padding-top: 50px;">
            <div class="textCenter">
                <h2 id="imgText"><b>Plan Your Next Trip With Kiwi Holiday </b></h2>
                <br><br>
                <button type="button" class="btn" id="imgButton" onclick="document.location='houseListing.php'"><b>Book Now</b></button>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <!-----Main Banner----->
        <!-----Search Box----->
        <div id="searchBox">
          <form method="get" action="houseListing.php">
            <div class="row justify-content-center gx-5">
                <input type="hidden" name="pet" value="">
                <input type="hidden" name="price" value="">
                <div class="input-group col ">       
                    <select class="form-select" name="location_id" >
                       <option value="" selected>Location</option>
                       <option value="1">Christchurch</option>
                       <option value="2">Queenstown</option>
                       <option value="3">Lake Tekapo</option>
                       <option value="" >Any</option>
                    </select>
                </div>
                <div class="input-group col ">
                    <div class="row">
                    <label for="checkIn" style="color: white;">Check In</label>
                    <input class="form-control" type="date"  name="check_in" >
                    </div>
                </div>
                <div class="input-group col  ">
                    <div class=" row">
                    <label for="checkOut" style="color: white;">Check Out</label>
                    <input class="form-control" type="date"  name="check_out">
                    </div>
                </div>
                <div class="input-group col ">
                     <select class="form-select" name="guest_num" >
                       <option value="" selected>Guest Number</option>
                       <option value="2">2</option>
                       <option value="4">4</option>
                       <option value="6">6</option>
                       <option value="" >Any</option>
                       
                     </select>
                </div>
                <div class="input-group col ">
                    <button type="submit" class="btn btn-primary" name="filterSearch" style="width: 100%;background-color:#00FFF0;border:none;"><span style="font-size: 30px;"><i class="fas fa-search"></i></span><b>&nbsp;&nbsp;Search</b></button>
                </div>
            </div>
          </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <!-----Search Box----->
        <div >
        <div class="row">
            <h3 style="color: white;" >Explore Fascinating Destination</h3>
        </div>
        <br>
        <br>
        <!-----Location Card----->
        <div class="row gx-5 justify-content-center" >
        <div class="col">
              <div class="card" style="border: none;">
                <img src="image/christchurch.jpg" class="card-img-top" alt="christchurch">
                <div class="card-body" style="background-color: #00FFF0;color:white;text-align:center">
                   <br>
                   <h5 class="card-title"><b>Christchurch</b></h5>
                   <p class="card-text"><?=$numC; ?> houses available</p>
                   <a href="houseListing.php?location_id=1&guest_num=&pet=&check_in=&check_out=&price=500&filterSearch=" class="btn" style="background-color: white;color:#00FFF0;width:200px;"><b>Explore</b></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="border: none;">
                <img src="image/queenstown.jpg" class="card-img-top" alt="christchurch">
                <div class="card-body" style="background-color: #00FFF0;color:white;text-align:center">
                   <br>
                   <h5 class="card-title"><b>Queenstown</b></h5>
                   <p class="card-text"><?=$numQ; ?> houses available</p>
                   <a href="houseListing.php?location_id=2&guest_num=&pet=&check_in=&check_out=&price=500&filterSearch=" class="btn" style="background-color: white;color:#00FFF0;width:200px;"><b>Explore</b></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="border: none;">
                <img src="image/tekapo.jpg" class="card-img-top" alt="christchurch">
                <div class="card-body" style="background-color: #00FFF0;color:white;text-align:center">
                   <br>
                   <h5 class="card-title"><b>Lake Tekapo</b></h5>
                   <p class="card-text"><?=$numL; ?> houses available</p>
                   <a href="houseListing.php?location_id=3&guest_num=&pet=&check_in=&check_out=&price=500&filterSearch=" class="btn" style="background-color: white;color:#00FFF0;width:200px;"><b>Explore</b></a>
                </div>
              </div>
            </div>
        </div>
        <br>
        <br>
        <!-----Location Card----->
        <div class="row text-end">
            <a href="houseListing.php?" style="text-decoration:none;"><h5 style="color: #00FFF0;">Browe all houses&nbsp;&nbsp;<span><i class="fas fa-angle-double-right"></i></span></h5></a>
        </div>
        <br>
        <br>
        </div>
        
        <!-----footer----->
        <?php include "footer.php"; ?>
        <!-----footer----->


    </div>
  </div>  
</div>
















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>   
<script>
    //$(document).ready(function(){
        //$("#loginModal").modal('show');
    //});
    
</script>
</body>
</html>