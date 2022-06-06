<?php 
include "library/config.php";
$guest_id = $_GET['guestId'];
$query = "SELECT * FROM booking WHERE guest_id = '$guest_id'";
$result = mysqli_query($link, $query);
$booking_num = mysqli_num_rows($result);

$queryF = "SELECT * FROM favourite WHERE  guest_id = '$guest_id' ";
$resultF = mysqli_query($link, $queryF);
$fav_num = mysqli_num_rows($resultF);


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
        <?php include "topNav.php"; ?>
        <!-----Top Nav Bar----->
        <br><br>
        <div class="row g-0"  role="tablist">
            <div class="col">
              <button id="leftSection" onclick="displayContent('hostH', 'hostB', this.id, 'rightSection')" >My Booking</button>
            </div>
            <div class="col">
              <button id="rightSection" onclick="displayContent('hostB', 'hostH', this.id, 'leftSection')">My Favourite</button>
            </div>   
        </div>
        <br><br>
        <div id="hostH">
           <div class="row">
             <div class="col">
               You have <?=$booking_num ;?> booking(s)
             </div>
           </div>
           <br>
           <div class="row">
             <div class="col">
               <p style="font-size: 12px;color:red;">***Once you booked a house, you have three days to complete your booking detail and confirm booking. If you fail to do so, your booking will be canceled automatically.Thank you for your understanding.***</p>
             </div>
           </div>
           <br>
           <div class="row">
            <div class="col">
             <table  class="table table-hover text-center align-middle" style="font-size: 12px;">
              <thead>
                <tr>
                  <th scope="col">House</th>
                  <th scope="col">Location</th>
                  <th scope="col">Check In</th>
                  <th scope="col">Check Out</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $queryB = "SELECT * FROM booking WHERE guest_id = '$guest_id'";
                $resultB = mysqli_query($link, $queryB);
                while($rowB = mysqli_fetch_array($resultB)){
                  extract($rowB);
                  $booking_id = $rowB['booking_id'];
                  $house_id = $rowB['house_id'];
                  $check_in = $rowB['check_in'];
                  $check_out = $rowB['check_out'];
                  $status_id = $rowB['status_id'];
                  $payment_id = $rowB['payment_id'];
                  $guest_num = $rowB['guest_num'];
                  $guest_name = $rowB['guest_name'];


                  $queryS = "SELECT * FROM booking_status WHERE status_id = '$status_id' "; 
                  $resultS = mysqli_query($link, $queryS);
                  $rowS = mysqli_fetch_assoc($resultS);
                  extract($rowS);
                  $status = $rowS['status'];

                 
                  $queryH = "SELECT * FROM house WHERE house_id = '$house_id'";
                  $resultH = mysqli_query($link, $queryH);
                  $rowH = mysqli_fetch_assoc($resultH);
                  extract($rowH);
                  $image_main = $rowH['image_main'];
                  $locatin_id = $rowH['location_id'];
                  $price = $rowH['price'];
                  $pet = $rowH['pet'];
                  $address = $rowH['address'];
                  $guest_max = $rowH['guest_num'];
                  //calculate how many nights guests stay to get the amount to pay
                  $in = new DateTime("$check_in");
                  $out = new DateTime("$check_out");
                  $interval = $in -> diff($out);
                  $nights = $interval->days ;
                  $bill = $nights * $price;

                  $queryL = "SELECT * FROM location WHERE location_id = '$locatin_id' "; 
                  $resultL = mysqli_query($link, $queryL);
                  $rowL = mysqli_fetch_assoc($resultL);
                  extract($rowL);
                  $location = $rowL['location'];

                 
                
                ?>
               
                <tr>
                  <td>
                    <a href="houseDetail.php?houseId=<?=$house_id; ?>">
                      <img src="upload/<?=$image_main; ?>" width="200">
                    </a>
                  </td>
                  <td><?=$location; ?></td>
                  <td><?=$check_in; ?></td>
                  <td><?=$check_out; ?></td>
                  <td><?=$status; ?></td>
                  <td>
                    <div class="row justify-content-md-center gx-2">
                     <?php if($status == "Booked"): ?>
                     <div class="col-2">  
                      <a type="button" data-bs-toggle="modal" data-bs-target="#completeBooking<?= $booking_id; ?>" title="complete booking" >
                        <span style="color: #E9BC4B;" ><i class="fas fa-edit"></i></span>
                      </a>
                     </div>
                     <?php endif; ?>
                     <?php if($status != "Booked" && $status != "Canceled" ): ?>
                     <div class="col-2">  
                      <a type="button" data-bs-toggle="modal" data-bs-target="#viewBooking<?= $booking_id; ?>" title="view booking">
                        <span style="color: #E9BC4B;" ><i class="fas fa-eye"></i></span>
                      </a>
                     </div>
                     <?php endif; ?>
                     <?php if($status != "Canceled" && $status != "Completed" ): ?>
                     <div class="col-2">  
                      <a type="button" data-bs-toggle="modal" data-bs-target="#cancelBooking<?= $booking_id; ?>" title="cancel booking">
                        <span style="color: #C57055;"><i class="fas fa-window-close"></i></span>
                      </a>
                     </div>
                     <?php endif; ?>
                     <?php
                     $queryRn = "SELECT * FROM review WHERE booking_id = '$booking_id' "; 
                     $resultRn = mysqli_query($link, $queryRn);
                     $review_num = mysqli_num_rows($resultRn);
                     if($status == "Completed" && $review_num == 0 ): 
                     ?>
                     <div class="col-2">  
                      <a type="button" data-bs-toggle="modal" data-bs-target="#reviewBooking<?= $booking_id; ?>" title="review booking">
                        <span style="color:aquamarine"><i class="fas fa-comment"></i></span>
                      </a>
                     </div>
                     <?php endif; ?>
                    
                     <div class="col-2">  
                      <a type="button" data-bs-toggle="modal" data-bs-target="#requestService<?= $booking_id; ?>" title="request customer service">
                        <span style="color: #C57055;"><i class="fas fa-people-arrows"></i></span>
                      </a>
                     </div>
                    </div>
                  </td>
                </tr>
                <!--complete booking modal-->
                <div class="modal fade" id="completeBooking<?= $booking_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Complete your booking</b></h5>
                        </div>
                        <br>
                        <form method="post" action="completeBooking.php" enctype="multipart/form-data">
                          <input name="booking_id" type="hidden"  value="<?= $booking_id; ?>"> 
                          <input name="guest_id" type="hidden"  value="<?= $guest_id; ?>">
                          <input name="guest_max" type="hidden"  value="<?= $guest_max; ?>">  
                          <div class="row">
                            <label for="guest_num" class="col-form-label" style="color: black;">How many guests:</label>
                            <input type="text" class="form-control" name="guest_num" placeholder="guest number" required>
                            <small style="color:gray;">Maxiam guest number is <?=$guest_max; ?></small>
                          </div>
                          <br>
                          <div class="row">
                            <label for="guest_name" class="col-form-label" style="color: black;">Name of main guest:</label>
                            <input type="text" class="form-control" name="guest_name" placeholder="legal full name" required >
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">With pet?</div>
                            <div class="col">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="pet" value="YES" <?php if($pet=="NO"): ?>disabled<?php endif;?> >
                              <label class="form-check-label" for="pet">
                               YES
                              </label>
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="pet" value="NO">
                              <label class="form-check-label" for="pet">
                               NO
                              </label>
                            </div>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <label for="credit_card_number" class="col-form-label" style="color: black;">Credit card number:</label>
                            <input type="text" class="form-control" name="credit_card_number" placeholder="authority only" required >
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">Amount to pay:
                              <h5 style="color:#00FFF0;">
                                $<?=$price; ?>&nbsp;X&nbsp; <?=$nights; ?>&nbsp;<span style="color:black;">night(s)</span>= &nbsp;$<?=$bill;?>
                              </h5>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <label for="payment_id" class="col-form-label" style="color: black;">How to pay:</label>
                            <select class="form-select" aria-label="Default select example" name="payment_id" required>
                              <option selected>Choose payment method</option>
                              <?php
                              $queryP = "SELECT * FROM payment"; 
                              $resultP = mysqli_query($link, $queryP);
                              while ($rowP = mysqli_fetch_array($resultP)){
                                extract($rowP);
                                $payment_id = $rowP['payment_id'];
                                $payment = $rowP['payment'];
                              ?>
                              <option value="<?=$payment_id; ?>"><?=$payment ;?></option>

                              <?php
                              }
                              ?>
                          </select>
                          </div>
                          <br>
                          <br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="confirmBooking" class="btn"  style="background-color: #00FFF0;color:white;width:50%"><b>Confirm Booking</b></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>            
                <!--complete booking modal-->
                <!--view booking modal-->
                <div class="modal fade" id="viewBooking<?= $booking_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>View your booking</b></h5>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col"><b>Booking reference:</b></div>
                          <div class="col"><?=$booking_id; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>House Address:</b></div>
                          <div class="col"><?=$address; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col"><b>Main guest's name:</b></div>
                          <div class="col"><?=$guest_name; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>How many guests:</b></div>
                          <div class="col"><?=$rowB['guest_num']; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>With pet?</b></div>
                          <div class="col"><?=$pet; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>Check in date:</b></div>
                          <div class="col"><?=$check_in; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>Check out date:</b></div>
                          <div class="col"><?=$check_out; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>Amount to pay:</b></div>
                          <div class="col" style="color:#00FFF0;"> $<?=$price; ?>&nbsp;X&nbsp; <?=$nights; ?>&nbsp;<span style="color:black;">night(s) &nbsp;=</span>&nbsp;$<?=$bill;?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>How to pay:</b></div>
                          <div class="col">
                            <?php 
                            $queryBp = "SELECT * FROM booking WHERE booking_id = '$booking_id'";
                            $resultBp = mysqli_query($link, $queryBp);
                            $rowBp = mysqli_fetch_array($resultBp);
                            extract($rowBp);
                            $payment_id = $rowBp['payment_id'];
                            
                            $queryP = "SELECT * FROM payment WHERE payment_id = '$payment_id'";
                            $resultP = mysqli_query($link, $queryP);
                            $rowP = mysqli_fetch_assoc($resultP);
                            extract($rowP);
                            $payment = $rowP['payment'];
                            echo $payment;
                            ?>
                          </div>
                        </div>
                        <br>
                        <div class="row justify-content-center ">
                            <button name="print" class="btn" onClick="window.print()"  style="background-color: #00FFF0;color:white;width:50%"><b>Print</b></button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>            
                <!--view booking modal-->
                <!--cancel booking modal-->
                <div class="modal fade" id="cancelBooking<?= $booking_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Cancel your booking</b></h5>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col"><b>Are you sure you want to cancel this booking?</b></div>
                        </div>
                        <br>
                        <form method="post" action="cancelBooking.php" enctype="multipart/form-data">
                          <input name="booking_id" type="hidden"  value="<?= $booking_id; ?>"> 
                          <input name="guest_id" type="hidden"  value="<?= $guest_id; ?>"> 
                          <div class="row justify-content-center ">
                            <button type="submit" name="cancelBooking" class="btn"  style="background-color: #00FFF0;color:white;width:50%"><b>Cancel Booking</b></button>
                          </div>
                        </form>
                        
                      </div>
                    </div>
                  </div>
                </div>            
                <!--cancel booking modal-->
                <!--review booking modal-->
                <div class="modal fade" id="reviewBooking<?= $booking_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Review This Booking </b></h5>
                        </div>
                        <br>
                        <form method="post" action="reviewBooking.php"  enctype="multipart/form-data">
                          <input name="booking_id" type="hidden"  value="<?= $booking_id; ?>"> 
                          <input name="house_id" type="hidden"  value="<?= $house_id; ?>"> 
                          <input name="guest_id" type="hidden"  value="<?= $guest_id; ?>"> 
                          <!--rating the booking-->
                          <div class="row">
                            <div class="col">Your Rating:</div>
                          </div>
                          <br>
                          <div class="row">
                         
                            <input id="star<?= $booking_id; ?>" name="star" value="" type="hidden" >
                            <div class="col-1">
                              <button onclick="ratingStar1('star1<?= $booking_id; ?>','star2<?= $booking_id; ?>','star3<?= $booking_id; ?>','star4<?= $booking_id; ?>','star5<?= $booking_id; ?>','star<?= $booking_id; ?>')"  style="background-color:transparent;border:none;">
                                <span style="color:#00FFF0 ; font-size:20PX;"><i  id="star1<?= $booking_id; ?>" class="far fa-star"></i></span>
                              </button>
                            </div>
                            <div class="col-1">
                              <button  onclick="ratingStar2('star1<?= $booking_id; ?>','star2<?= $booking_id; ?>','star3<?= $booking_id; ?>','star4<?= $booking_id; ?>','star5<?= $booking_id; ?>','star<?= $booking_id; ?>')" style="background-color:transparent;border:none;">
                                <span style="color:#00FFF0 ; font-size:20PX;"><i id="star2<?= $booking_id; ?>" class="far fa-star"></i></span>
                              </button>
                            </div>
                            <div class="col-1">
                              <button  onclick="ratingStar3('star1<?= $booking_id; ?>','star2<?= $booking_id; ?>','star3<?= $booking_id; ?>','star4<?= $booking_id; ?>','star5<?= $booking_id; ?>','star<?= $booking_id; ?>')" style="background-color:transparent;border:none;">
                                <span style="color:#00FFF0 ; font-size:20PX;"><i id="star3<?= $booking_id; ?>" class="far fa-star"></i></span>
                              </button>
                            </div>
                            <div class="col-1">
                              <button  onclick="ratingStar4('star1<?= $booking_id; ?>','star2<?= $booking_id; ?>','star3<?= $booking_id; ?>','star4<?= $booking_id; ?>','star5<?= $booking_id; ?>','star<?= $booking_id; ?>')" style="background-color:transparent;border:none;">
                                <span style="color:#00FFF0 ; font-size:20PX;"><i id="star4<?= $booking_id; ?>" class="far fa-star"></i></span>
                              </button>
                            </div>
                            <div class="col-1">
                              <button  onclick="ratingStar5('star1<?= $booking_id; ?>','star2<?= $booking_id; ?>','star3<?= $booking_id; ?>','star4<?= $booking_id; ?>','star5<?= $booking_id; ?>','star<?= $booking_id; ?>')" style="background-color:transparent;border:none;">
                                <span style="color:#00FFF0 ; font-size:20PX;"><i id="star5<?= $booking_id; ?>" class="far fa-star"></i></span>
                              </button>
                            </div>
                          </div>
                          <br>
                        
                          <!--rating the booking-->
                        
                          <div class="row">
                            <label for="comment" class="col-form-label" style="color: black;">Your Comment:</label>
                            <textarea class="form-control" name="comment" rows="6" placeholder="Please leave your comment here..." required autocomplete="off"></textarea>
                            <small  style="color: gray;">***Your comment about this house will be displayed on the house page.***</small>
                          </div>
                          <br>
                          
                          <br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="reviewBooking" class="btn"  style="background-color: #00FFF0;color:white;width:50%"><b>Review</b></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>            
                 <!--review booking modal-->
                 <!--request service modal-->
                 <div class="modal fade" id="requestService<?= $booking_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Request Service From KH</b></h5>
                        </div>
                        <br>
                        <form method="post" action="requestService.php" enctype="multipart/form-data">
                          <input name="booking_id" type="hidden"  value="<?= $booking_id; ?>"> 
                          <input name="guest_id" type="hidden"  value="<?= $guest_id; ?>"> 
                          <div class="row">
                            <label for="email" class="col-form-label" style="color: black;">Your email:</label>
                            <input type="email" class="form-control" name="email" placeholder="abc@abc.com" required>
                          </div>
                          <br>
                          <div class="row">
                            <label for="message" class="col-form-label" style="color: black;">Your message:</label>
                            <textarea class="form-control" name="message" rows="6" placeholder="making enquiry about this booking..." required ></textarea>
                            <small  style="color: gray;">***We will get back to you as soon as possible.***</small>
                          </div>
                          <br>
                          
                          <br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="requestService" class="btn"  style="background-color: #00FFF0;color:white;width:50%"><b>Request Service</b></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>            
                <!--request service modal-->
                <?php
                }
                ?>
              </tbody>
             </table>
            </div>
           </div>     
        </div>
        <div  id="hostB" style="display: none;">
          <div class="row">
             <div class="col">
               You have <?=$fav_num;?> Favourite(s)
             </div>
          </div>
          <br>
          <div class="row">
           
            <?php
            $queryF = "SELECT * FROM favourite WHERE  guest_id = '$guest_id' ";
            $resultF = mysqli_query($link, $queryF);
            while($rowF = mysqli_fetch_array($resultF)){
                extract($rowF);
                $house_id  = $rowF['house_id'];
                $queryFh = "SELECT * FROM house WHERE house_id = '$house_id'";
                $resultFh = mysqli_query($link, $queryFh);
                while($rowFh = mysqli_fetch_array($resultFh)){
                  extract($rowFh);
                  $image_main = $rowFh['image_main'];
                  $title = $rowFh['title'];
                  $address = $rowFh['address'];
                  $price = $rowFh['price'];
                ?>

           
            <div class="col-3">
              <a href="houseDetail.php?houseId=<?=$house_id; ?>" style="text-decoration: none;color:black;">
              <div class="card"  >
                <img src="upload/<?=$image_main; ?>" class="card-img-top" >
                <div class="position-absolute top-0 start-0">
                  <!--edit favourite funtion-->
                 <form method="POST" action="editFavL.php" >
                   <input type="hidden" name="house_id" value="<?=$house_id; ?>">
                   <input type="hidden" name="this_fav_num" value="<?php 
                    $guest_id = $_SESSION['user_id'];
                    $queryFi = "SELECT * FROM favourite WHERE house_id = '$house_id' AND guest_id = '$guest_id' ";
                    $resultFi = mysqli_query($link, $queryFi);
                    $this_fav_num = mysqli_num_rows($resultFi);
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
                <div class="card-body">
                  <h6 class="card-title"><b><?=$title; ?></b></h6>
                  <br>
                <p class="card-text"><span style="color:red;font-size:15px;"><i class="fas fa-map-marker-alt"></i></span>&nbsp;<?=$address; ?></p>
                 <h5 class="card-text" style="color:#00FFF0;text-align:right;"><b>$<?=$price; ?></b><span style="color:black;font-size:15px;"> Per Night</span></h5>
                </div>
              </div>
              </a>
            </div>
            <?php
                }
            }
            ?>
          
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
   
        
        <!-----footer----->
        <?php include "footer.php"; ?>
        <!-----footer----->


    </div>
  </div>  
</div>
















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script>
  function displayContent(id1, id2, idB1, idB2){
    document.getElementById(id1).style.display = "block";
    document.getElementById(id2).style.display = "none";
    document.getElementById(idB1).style.backgroundColor = "black";
    document.getElementById(idB2).style.backgroundColor = "white";
    document.getElementById(idB1).style.color = "white";
    document.getElementById(idB2).style.color = "black";
  }

  function ratingStar1(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id1).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id).value = "1";
  } else {
    document.getElementById(id1).className = "far fa-star";
    document.getElementById(id).value = "";
  }
  if (document.getElementById(id2).className == "fas fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "far fa-star";
    document.getElementById(id3).className = "far fa-star";
    document.getElementById(id4).className = "far fa-star";
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "1";
  }
}
function ratingStar2(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id2).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id).value = "2";
  } else {
    document.getElementById(id2).className = "far fa-star";
    document.getElementById(id).value = "1";
  }
  if (document.getElementById(id3).className == "fas fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "far fa-star";
    document.getElementById(id4).className = "far fa-star";
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "2";
  }
}
function ratingStar3(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id3).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id).value = "3";
  } else {
    document.getElementById(id3).className = "far fa-star";
    document.getElementById(id).value = "2";
  }
  if (document.getElementById(id4).className == "fas fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id4).className = "far fa-star";
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "3";
  }
}
function ratingStar4(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id4).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id4).className = "fas fa-star";
    document.getElementById(id).value = "4";
  } else {
    document.getElementById(id4).className = "far fa-star";
    document.getElementById(id).value = "3";
  }
  if (document.getElementById(id5).className == "fas fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id4).className = "fas fa-star";
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "4";
  }
}
function ratingStar5(id1, id2, id3, id4, id5, id) {
  if (document.getElementById(id5).className == "far fa-star") {
    document.getElementById(id1).className = "fas fa-star";
    document.getElementById(id2).className = "fas fa-star";
    document.getElementById(id3).className = "fas fa-star";
    document.getElementById(id4).className = "fas fa-star";
    document.getElementById(id5).className = "fas fa-star";
    document.getElementById(id).value = "5";
  } else {
    document.getElementById(id5).className = "far fa-star";
    document.getElementById(id).value = "4";
  }
}


  
</script>  

</body>
</html>