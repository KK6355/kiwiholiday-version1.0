<?php 
include "library/config.php";

$error_email = "";
$error_password = "";

$searchUrl = "";
$locatin_id = "";
$guest_num = "";
$pet = "";
$check_in = "";
$check_out = "";
$price = "";






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
        <div class="row">
        <!----side filter-->
          <div class="col-lg-4">
            <form method="get" enctype="multipart/form-data">
              <div class="row">
                  <h6><b>Filters:</b></h6>
              </div>
              <div class="row">
                  <a href="houseListing.php" style="text-decoration:none;"><p style="font-size:12px;color:#00FFF0;">Reset Filter</p></a>
              </div>
             
              <div class="row">
                  <p>Location:</p>  
              </div>
              <div class="row text-start" style="font-size: 15px;">
               <div class="col">
  
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="location_id" value="1" <?php if(isset($_GET['location_id'])&&$_GET['location_id']==1): ?>checked<?php endif; ?>>
                  <label class="form-check-label" for="location_id">
                    Christchurch
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="location_id" value="2" <?php if(isset($_GET['location_id'])&&$_GET['location_id']==2): ?>checked<?php endif; ?> >
                  <label class="form-check-label" for="location_id">
                    Queenstown
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="location_id" value="3" <?php if(isset($_GET['location_id'])&&$_GET['location_id']==3): ?>checked<?php endif; ?>>
                  <label class="form-check-label" for="location_id">
                    Lake Tekapo
                  </label>
              </div>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="location_id" value="" <?php if((isset($_GET['location_id'])&&$_GET['location_id']=="") || !isset(($_GET['location_id'])) ): ?>checked<?php endif; ?> >
                  <label class="form-check-label" for="location_id">
                    Any
                  </label>
                </div>
               </div>
              </div>
              <br>
              <div class="row">
                <p>Guest:</p>  
              </div>
              <div class="row text-start" style="font-size: 15px;">
               <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="guest_num" value="2" <?php if(isset($_GET['guest_num'])&&$_GET['guest_num']==2): ?>checked<?php endif; ?> >
                  <label class="form-check-label" for="guest_num">
                     2
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="guest_num" value="4" <?php if(isset($_GET['guest_num'])&&$_GET['guest_num']==4): ?>checked<?php endif; ?> >
                  <label class="form-check-label" for="guest_num">
                     4
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="guest_num" value="6" <?php if(isset($_GET['guest_num'])&&$_GET['guest_num']==6): ?>checked<?php endif; ?> >
                  <label class="form-check-label" for="guest_num">
                     6
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="guest_num" value="" <?php if((isset($_GET['guest_num'])&&$_GET['guest_num']=="") || !isset(($_GET['guest_num'])) ): ?>checked<?php endif; ?>>
                  <label class="form-check-label" for="guest_num">
                     Any
                  </label>
                </div>
               </div>
              </div>
              <br>
              <div class="row">
                <p>With Pet:</p>  
              </div>
              <div class="row text-start" style="font-size: 15px;">
               <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pet" value="YES" <?php if(isset($_GET['pet'])&&$_GET['pet']=="YES"): ?>checked<?php endif; ?> >
                  <label class="form-check-label" for="pet">
                     YES
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pet" value="NO" <?php if(isset($_GET['pet'])&&$_GET['pet']=="NO"): ?>checked<?php endif; ?> >
                  <label class="form-check-label" for="pet">
                     NO
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pet" value="" <?php if((isset($_GET['pet'])&&$_GET['pet']=="") || !isset(($_GET['pet'])) ): ?>checked<?php endif; ?> >
                  <label class="form-check-label" for="pet">
                     NOT SURE
                  </label>
                </div>
               </div>
              </div>
              <br>
              <div class="row">
                <label class="form-label" for="check_in">Check In: </label>
                <div class="col-6">
                <input type="date" class="form-control" name="check_in"  <?php if(isset($_GET['check_in']) && $_GET['check_in']!=""): ?>value="<?= $_GET['check_in'];?>"<?php endif; ?> > 
                </div> 
              </div>
              <br>
              <div class="row">
                <label class="form-label" for="check_out">Check Out: </label>
                <div class="col-6">
                <input type="date" class="form-control" name="check_out" <?php if(isset($_GET['check_out']) && $_GET['check_out']!=""): ?>value="<?= $_GET['check_out'];?>"<?php endif; ?>> 
                </div> 
              </div>
              <br>
              <div class="row">
                <div class="col-6">
                  <label for="price" class="form-label">Price Range(per night):</label>
                  <input type="range" class="form-range" min="50" max="500" step="50" name="price" value="<?php if(isset($_GET['price']) && $_GET['price']!=""):  echo $_GET['price']; else: ?>500<?php endif; ?>">
                  <div class="row">
                     <div class="col text-start">50</div>
                     <div class="col text-end">$500</div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col">
                  <button type="submit" class="btn" name="filterSearch" style="background:#00FFF0;color:white;width:50%;"><b>Search House</b></button>
                </div>
              </div>
              <br>
              <br>
            </form>     
          </div>
        <!----side filter-->
        <!----Listing section-->
          <div class="col-lg-8">
            <?php 
            
             //search function
             if(isset($_GET['filterSearch'])){
              $filter = array();
              $filter[] = " status_id = 2 ";
              

              if ($_GET['location_id']){
                  $locatin_id = $_GET['location_id'];
                  $filter[] = " location_id = '$locatin_id' ";
                  $searchUrl =  "&location_id=".$locatin_id."&guest_num=&pet=&check_in=&check_out=&price=&filterSearch=";
                  
              }
              if ($_GET['guest_num']){
                  $guest_num = $_GET['guest_num'];
                  $filter[] = " guest_num >= '$guest_num'";
                  $searchUrl = "&location_id=&guest_num=".$guest_num."&pet=&check_in=&check_out=&price=&filterSearch=";
              }
              if ($_GET['pet']){
                  $pet = $_GET['pet'];
                  $filter[] = " pet = '$pet'";
                  $searchUrl = "&location_id=&guest_num=&pet=".$pet."&check_in=&check_out=&price=&filterSearch=";
              }
           
          
              if ($_GET['price']){
                  $price = $_GET['price'];
                  $filter[] = "price < $price"; 
                  $searchUrl = "&location_id=&guest_num=&pet=&check_in=&check_out=&price=".$price."&filterSearch=";
              }
              if ($_GET['check_in'] && $_GET['check_out']) {
                $check_in = $_GET['check_in'];
                $check_out = $_GET['check_out'];
                //if check_in and check_out date selected, query from booking
                $queryB = "SELECT house_id FROM booking WHERE ('$check_out' >= check_in  AND '$check_in' <= check_out AND status_id != 4 ) ";
                $resultB = mysqli_query($link, $queryB);
                 
                $rows = mysqli_fetch_all($resultB, MYSQLI_ASSOC);//get the all the matched rows.
                foreach ($rows as $row){
                  $house_id = $row['house_id'];
                  $filter[] = "house_id != '$house_id'";
                } 
                $searchUrl = "&location_id=&guest_num=&pet=&check_in=".$check_in."&check_out=".$check_out."&price=&filterSearch=";
              
              }
          
             $searchUrl = "&location_id=".$locatin_id."&guest_num=".$guest_num."&pet=".$pet."&check_in=".$check_in."&check_out=".$check_out."&price=".$price."&filterSearch=";

              $queryH = "SELECT * FROM house WHERE ";
              $queryH .= implode(" && ", $filter);
              
              $resultH = mysqli_query($link, $queryH);

          
          } else {
              $queryH = "SELECT * FROM house WHERE status_id = 2 ";
              $resultH = mysqli_query($link, $queryH);
          }
              //pagination
              $results_per_page = 3;
              if(!isset($_GET['page'])){
                $page = 1;
              } else {
                $page = $_GET['page'];
              }
  
              $this_page_result = ($page-1) * $results_per_page;
              
              $number_of_results = mysqli_num_rows($resultH);
              $number_of_pages = ceil($number_of_results / $results_per_page)  ;
              
              $queryH .=" LIMIT ".$this_page_result.",".$results_per_page;
              $resultH = mysqli_query($link, $queryH);

              while($rowH = mysqli_fetch_array($resultH)){
              $house_id = $rowH['house_id'];
              $location_id = $rowH['location_id'];
              $image_main = $rowH['image_main'];
              $title = $rowH['title'];
              $guest_num = $rowH['guest_num'];
              $bedroom_num = $rowH['bedroom_num'];
              $shower_num = $rowH['shower_num'];
              $pet = $rowH['pet'];
              $price = $rowH['price'];

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

            ?>
           
            <div class="row">
              <a href="houseDetail.php?houseId=<?=$house_id; ?>" style="text-decoration:none;color:black;">
                <div class="col-6">
                  <!--carousel-->
                 <div id="houseGallery<?=$house_id; ?>" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                   <div class="carousel-inner">
                     <div class="carousel-item active" style="border:none;">
                       <img src="upload/<?= $image_main;?>" width="400"  >
                     </div>
                     <?php 
                     $queryG = "SELECT * FROM gallery WHERE house_id = '$house_id'";
                     $resultG = mysqli_query($link, $queryG);
                     while ($rowG = mysqli_fetch_array($resultG)){
                       $image = $rowG['image'];
                     ?>
                     <div class="carousel-item" style="border:none;">
                       <img src="upload/<?= $image;?>" width="400" >
                     </div>
                     <?php 
                     }
                     ?>
                   </div>
                   <button class="carousel-control-prev" type="button" data-bs-target="#houseGallery<?=$house_id; ?>" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Previous</span>
                   </button>
                   <button class="carousel-control-next" type="button" data-bs-target="#houseGallery<?=$house_id; ?>" data-bs-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Next</span>
                   </button>
                </div>
                   
                <!--carousel ends-->
                </a>
               </div>
              
               <div class="col-6">
                 <h5><b><?= $title; ?></b></h5>
                 <!--edit favourite funtion-->
                 <div class="row">
                 <div class="col">
                 <form method="POST" action="editFav.php" >
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
                 </div>
                 <div class="col text-end" ><b><?php echo  $star_ave;?></b>
                   <span style="color:gold;font-size:25px;"><i class="fas fa-star"></i></span>
                  </div>
                 </div>    
                 <!--edit favourite funtion-->
                 <div class="row">
                   <div class="col" style="line-height:0.8;" >
                     <br><br>
                     <p>
                       <span style="color:red;"><i class="fas fa-map-marker-alt"></i></span>
                       <?php
                       $queryL = "SELECT * From location WHERE location_id = '$location_id' ";
                       $resultL = mysqli_query($link, $queryL);
                       $rowL = mysqli_fetch_assoc($resultL);
                       extract($rowL);
                       $location = $rowL['location'];
                       ?>
                       &nbsp; <?= $location; ?>
                      </p>
                     <p><?= $guest_num; ?> Guest</p>
                     <p><?=$bedroom_num; ?> Bedroom</p>
                     <p><?=$shower_num; ?> Bath</p>
                     <p>Pet Friendly: <?=$pet; ?> </p>
                   </div>
                   <div class="col text-end" style="line-height:0.8;" >
                     <br><br><br><br><br><br><br><br><br><br><br>
                     <h5 style="color:#00FFF0;"><b>$<?=$price; ?>/Per Night</b></h5>
                   </div>
                 </div>
               </div>
            </div>
            <hr>
           
            <?php
            }
            ?>
            <br>
            <!--pagination-->
            <div class="row text-center">
              <div class="col">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item
                    <?php if($number_of_pages==1 || $_GET['page'] - 1 == 0 ):?> disabled <?php endif; ?>>
                    ">
                      <a class="page-link" href="houseListing.php?page=<?=$_GET['page'] - 1;?><?=$searchUrl;?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <?php 
                    for($page=1; $page<=$number_of_pages;$page++){
                    ?>
                      <li class="page-item 
                      <?php if($page == $_GET['page']):?> active <?php endif; ?>>
                      "><a class="page-link" href="houseListing.php?page=<?=$page;?><?=$searchUrl;?>"><?=$page;?></a></li>
                    <?php
                    }
                    ?>
                  
                    
                    <li class="page-item
                    <?php if($number_of_pages==1 || $_GET['page'] - $number_of_pages == 0 ):?> disabled <?php endif; ?>>
                    ">
                      <a class="page-link" href="houseListing.php?page=<?=$_GET['page'] + 1;?><?=$searchUrl;?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <!--pagination--> 

            
          </div>
          
          
        <!----Listing section ends-->
        </div>
        
        
   
        
        <!-----footer----->
        <?php include "footer.php"; ?>
        <!-----footer----->


    </div>
  </div>  
</div>
















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 


</body>
</html>