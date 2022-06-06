<?php 
include "library/config.php";

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
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="houseListing.php">Book a holiday house</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link   active" href="aboutUs.php">Kiwi Holiday</a>
                </li>
                <!-----session section----->
                <?php include "sessionSection.php"; ?>
                <!-----session section----->
            </ul>   
        </div>
        <!-----Top Nav Bar----->
        <!-----Main Banner----->
        <div class="text-center imgContainer">
            <img src="image/aboutUs.jpg"  class="img-fluid rounded" style="padding-top: 50px;">
        </div>
        <br>
        <br>
        <br>
        <br>
        <!-----Main Banner----->
        <div class="row gx-5">
            <div class="col">
                <p style="color:#00FFF0;font-size:40px;">“</p>
                <p style="color:white ;font-size:20px;">Kiwi Holiday is 100% NZ owned online house rental company. We offer guests who are from worldwide a comfy holiday house for their fascinating trip in NZ, especially for them who are  travelling with their pets. We offer hosts who own their beautiful houses in attractions a reliable third party platform for them to host their houses and make profit. Contact us if you are interested in hosting your own house or simply register on the top section.</p>
                <p style="color:#00FFF0;font-size:40px;text-align:right;">”</p>
            </div>
            <div class="col">
                <h5 style="color:white;text-align:center;"><b>Contact Us</b></h5>
                <form method="post" action="contactUs.php" enctype="multipart/form-data">
                        
                   <div class="row">
                        <label for="email" class="col-form-label" style="color: white;">Your Email</label>
                        <input type="email" class="form-control" name="email" placeholder="abc@abc.com" required>
                    </div>
                    <br>
                    <div class="row">
                        <label for="message" class="col-form-label" style="color: white;">Your Message</label>
                        <textarea class="form-control" name="message" rows="6" placeholder="making enquiry about hosting..." required ></textarea>   
                    </div>
                    <br>
                    <br>
                    <div class="row justify-content-center ">
                        <button type="submit" name="contactUs" class="btn "  style="background-color: #00FFF0;color:white;width:50%;"><b>Make Enquiry</b></button>
                    </div>
                </form>
            </div>
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