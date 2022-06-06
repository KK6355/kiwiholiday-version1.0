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
                <a href="booking.php" style="text-decoration: none;color:#E9BC4B;">Booking Management</a>
                <a href="review.php" style="text-decoration: none;color:white;">Review Management</a>
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
                <h4><b>Booking Overview</b></h4>
              </div>
              <div class="col text-end">
                <a type="button" data-bs-toggle="modal" data-bs-target="#addBooking" title="add booking">
                  <span style="font-size: 25px;color: #E858BF;"><i class="fas fa-bell"></i><b>+</b></span>
                </a>
              </div>
              <!--add booking-->
               <div class="modal fade" id="addBooking" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="../image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Add booking</b></h5>
                        </div>
                        <br>
                       <div class="text-start" style="font-size:15px;">
                        <form method="post" action="addBooking.php" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col">
                              <label class="form-label" for="house_id"><b>House ID: </b></label>
                              <input class="form-control" name="house_id" required >
                            </div> 
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <label class="form-label" for="guest_id"><b>Guest ID: </b></label>
                              <input class="form-control" name="guest_id" required >
                            </div> 
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <label class="form-label" for="check_in"><b>Check In:</b></label>
                              <input type="date" class="form-control" name="check_in"  required > 
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <label class="form-label" for="check_out"><b>Check Out: </b></label>
                              <input type="date" class="form-control" name="check_out"  required >
                            </div> 
                          </div>
                          <br>
                          <div class="row">
                            <label for="guest_num" class="col-form-label" style="color: black;"><b>How many guests:</b></label>
                            <input type="text" class="form-control" name="guest_num" placeholder="guest number"  required>
                          </div>
                          <br>
                          <div class="row">
                            <label for="guest_name" class="col-form-label" style="color: black;"><b>Name of main guest:</b></label>
                            <input type="text" class="form-control" name="guest_name" placeholder="legal full name"  required >
                          </div>
                          <br>
                          <div class="row">
                            <div class="col"><b>With pet?</b></div>
                            <div class="col">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="pet" value="YES" >
                              <label class="form-check-label" for="pet">
                               YES
                              </label>
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="pet" value="NO" >
                              <label class="form-check-label" for="pet">
                               NO
                              </label>
                            </div>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <label for="credit_card_number" class="col-form-label" style="color: black;"><b>Credit card number:</b></label>
                            <input type="text" class="form-control" name="credit_card_number" placeholder="authority only"  required >
                          </div>
                          <br>
                          <div class="row">
                            <label for="payment_id" class="col-form-label" style="color: black;"><b>How to pay:</b></label>
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
                              <option value="<?=$payment_id; ?>" ><?=$payment ;?></option>

                              <?php
                              }
                              ?>
                          </select>
                          </div>
                          <br>
                      
                          <br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="addBooking" class="btn"  style="background-color: #00FFF0;color:white;width:50%"><b>Add Booking</b></button>
                          </div>
                        </form>
                       </div>
                      </div>
                    </div>
                  </div>
                </div>            
              <!--add booking-->
            </div>
            <br>
            <div class="row">
            <table  class="table table-hover text-center" style="font-size: 12px;">
              <thead style="background-color:black;color:white;">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Guest_id</th>
                  <th scope="col">House_id</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $queryB = "SELECT * FROM booking WHERE status_id != 2  ";
                $resultB = mysqli_query($link, $queryB);
                while ($rowB = mysqli_fetch_array($resultB)){
                  extract($rowB);
                  $booking_id = $rowB['booking_id'];
                  $guest_id = $rowB['guest_id'];
                  $house_id = $rowB['house_id'];
                  $status_id = $rowB['status_id'];
                  $check_in = $rowB['check_in'];
                  $check_out = $rowB['check_out'];
                  $pet = $rowB['pet'];
                  $guest_num = $rowB['guest_num'];
                  $guest_name = $rowB['guest_name'];
                  $credit_card_number = $rowB['credit_card_number'];
                  $payment_id = $rowB['payment_id'];

                 
                  $queryH = "SELECT address, price, guest_num FROM house WHERE house_id = '$house_id'";
                  $resultH = mysqli_query($link, $queryH);
                  $rowH =  mysqli_fetch_array($resultH);
                  extract($rowH);
                  $address = $rowH['address'];
                  $price = $rowH['price'];
                  $guest_max = $rowH['guest_num'];

                  $queryS = "SELECT * FROM booking_status WHERE status_id = '$status_id' ";
                  $resultS = mysqli_query($link, $queryS);
                  $rowS = mysqli_fetch_assoc($resultS);
                  extract($rowS);
                  $status = $rowS['status'];

                  $in = new DateTime("$check_in");
                  $out = new DateTime("$check_out");
                  $interval = $in -> diff($out);
                  $nights = $interval->days ;
                  $bill = $nights * $price;
                ?>
              
                <tr>
                  <th scope="row"><?= $booking_id; ?></th>
                  <td><?= $guest_id; ?></td>
                  <td><?= $house_id; ?></td>
                  <td><?= $status; ?></td>
                  <td>
                  <?php if($status_id != 4): ?>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#viewBooking<?= $booking_id; ?>" title="view booking">
                      <span style="color: #E9BC4B;" ><i class="fas fa-eye"></i></span>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if($status_id == 1 ): ?>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#editBooking<?= $booking_id; ?>" title="edit booking">
                      <span style="color: #E9BC4B;" ><i class="fas fa-edit"></i></span>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php endif; ?>
                    <?php else: ?>
                    <a href="javascript:deleteBooking(<?= $booking_id; ?>)" title="delete booking">
                      <span style="color: #C57055;"><i class="fas fa-trash-alt"></i></span>
                    </a>
                    <?php endif; ?>
             <!--view booking modal-->
                <div class="modal fade" id="viewBooking<?= $booking_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="../image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>View this booking</b></h5>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col"><b>Booking reference:</b></div>
                          <div class="col"><?=$booking_id; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>House Address:</b></div>
                          <div class="col"><?=$address;?></div>
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
                       
                        
                      </div>
                    </div>
                  </div>
                </div>            
                <!--view booking modal-->
                <!--edit booking modal-->
                <div class="modal fade" id="editBooking<?= $booking_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="../image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Edit this booking</b></h5>
                        </div>
                        <br>
                       <div class="text-start" style="font-size:15px;">
                        <form method="post" action="editBooking.php" enctype="multipart/form-data">
                          <input name="booking_id" type="hidden"  value="<?= $booking_id; ?>"> 
                          <input name="house_id" type="hidden"  value="<?= $house_id; ?>"> 
                          <input name="guest_max" type="hidden"  value="<?= $guest_max; ?>">
                          <div class="row">
                            <div class="col">
                              <label class="form-label" for="check_in"><b>Check In:</b></label>
                              <input type="date" class="form-control" name="check_in" value="<?= $check_in; ?>" required > 
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <label class="form-label" for="check_out"><b>Check Out: </b></label>
                              <input type="date" class="form-control" name="check_out" value="<?= $check_out; ?>" required >
                            </div> 
                          </div>
                          <br>
                          <div class="row">
                            <label for="guest_num" class="col-form-label" style="color: black;"><b>How many guests:</b></label>
                            <input type="text" class="form-control" name="guest_num" placeholder="guest number" value="<?= $guest_num; ?>"  required>
                            <small style="color:gray;">Maxiam guest number is <?=$guest_max; ?></small>
                          </div>
                          <br>
                          <div class="row">
                            <label for="guest_name" class="col-form-label" style="color: black;"><b>Name of main guest:</b></label>
                            <input type="text" class="form-control" name="guest_name" placeholder="legal full name" value="<?= $guest_name; ?>" required >
                          </div>
                          <br>
                          <div class="row">
                            <div class="col"><b>With pet?</b></div>
                            <div class="col">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="pet" value="YES" 
                               
                              <?php
                              $queryPet = "SELECT pet FROM house WHERE house_id = '$house_id'";
                              $resultPet = mysqli_query($link, $queryPet);
                              $rowPet = mysqli_fetch_assoc($resultPet);
                              $petCheck = $rowPet['pet'];
                              if($petCheck =="NO"){
                                echo "disabled";
                              }
                              if($pet == "YES"){
                                echo "checked";
                              }
                              ?>
                              >
                              <label class="form-check-label" for="pet">
                               YES
                              </label>
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="pet" value="NO" <?php if($pet == "NO"):?>checked<?php endif; ?>>
                              <label class="form-check-label" for="pet">
                               NO
                              </label>
                            </div>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <label for="credit_card_number" class="col-form-label" style="color: black;"><b>Credit card number:</b></label>
                            <input type="text" class="form-control" name="credit_card_number" placeholder="authority only" value="<?= $credit_card_number; ?>" required >
                          </div>
                          <br>
                          <div class="row">
                            <div class="col"><b>Amount to pay:</b>
                              <h5 style="color:#00FFF0;">
                                $<?=$price; ?>&nbsp;X&nbsp; <?=$nights; ?>&nbsp;<span style="color:black;">night(s)</span>= &nbsp;$<?=$bill;?>
                              </h5>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <label for="payment_id" class="col-form-label" style="color: black;"><b>How to pay:</b></label>
                            <select class="form-select" aria-label="Default select example" name="payment_id" required>
                            
                              <?php
                              $queryP = "SELECT * FROM payment"; 
                              $resultP = mysqli_query($link, $queryP);
                              while ($rowP = mysqli_fetch_array($resultP)){
                                extract($rowP);
                                $payment_id = $rowP['payment_id'];
                                $payment = $rowP['payment'];
                              ?>
                              <option value="<?=$payment_id; ?>" <?php if($payment_id == $rowB['payment_id']):?>selected<?php endif; ?>><?=$payment ;?></option>

                              <?php
                              }
                              ?>
                          </select>
                          </div>
                          <br>
                          <div class="row">
                            <label for="status_id" class="col-form-label" style="color: black;"><b>Booking status:</b></label>
                            <select class="form-select" aria-label="Default select example" name="status_id" required>
                              <option selected>Change booking status</option>
                              <?php
                              $queryS = "SELECT * FROM booking_status";
                              $resultS = mysqli_query($link, $queryS);
                              while ($rowS = mysqli_fetch_array($resultS)){
                                extract($rowS);
                                $status_id = $rowS['status_id'];
                                $status = $rowS['status'];
                              ?>
                              <option value="<?=$status_id; ?>" <?php if($status_id == $rowB['status_id']):?>selected<?php endif; ?>><?=$status ;?></option>

                              <?php
                              }
                              ?>
                          </select>
                          </div>
                          <br>
                          <br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="editBooking" class="btn"  style="background-color: #00FFF0;color:white;width:50%"><b>Update Booking</b></button>
                          </div>
                        </form>
                       </div>
                      </div>
                    </div>
                  </div>
                </div>            
                <!--edit booking modal-->
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
function deleteBooking(booking_id) {
  if (confirm("Are you sure you want to delete this booking?")) {
    window.location.href = "deleteBooking.php?bookingId=" + booking_id;
  }

}  
</script>
</body>
</html>