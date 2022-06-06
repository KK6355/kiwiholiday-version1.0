<?php 
include "library/config.php";
include "library/image-creation.php";

$host_id = $_GET['hostId'];

$queryB = "SELECT  house.host_id, house.image_main, house.price, booking.booking_id, booking.guest_name, booking.check_in, booking.check_out, booking.guest_num, booking.pet, booking.payment_id, booking.status_id FROM house INNER JOIN booking ON house.house_id = booking.house_id WHERE host_id = '$host_id' AND (booking.status_id != 2 && booking.status_id != 4)";
$resultB = mysqli_query($link, $queryB);
$booking_num = mysqli_num_rows($resultB);

$queryHn = "SELECT * FROM house WHERE host_id = '$host_id' ";
$resultHn = mysqli_query($link, $queryHn);
$house_num = mysqli_num_rows($resultHn);


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
    <link rel="stylesheet" href="css/magnific-popup.css">

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
              <button id="leftSection" onclick="displayContent('hostB', 'hostH', this.id, 'rightSection')" >Guest Booking</button>
            </div>
            <div class="col">
              <button id="rightSection" onclick="displayContent('hostH', 'hostB', this.id, 'leftSection')">Hosted House</button>
            </div>   
        </div>
        <br><br>
        <!--House section-->
        <div id="hostH" style="display: none;">
            <div class="row">
              <div class="col">
                You have <?=$house_num; ?> hosted house(s)
              </div>
              <div class="col text-end">
                <a type="button" data-bs-toggle="modal" data-bs-target="#hostHouse" title="host house">
                <span style="font-size: 25px;color:#00FFF0;"><i class="fas fa-house-user"></i><b>+</b></span>
                </a>
              </div>
              <!-----Host house modal----->
              <div class="modal fade" id="hostHouse" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid" style="width: 80px;">
                          <h5 style="color: black;"><b>Host Your House</b></h5>
                        </div>
                        <br>
                        <form method="post" action="hostHouse.php" enctype="multipart/form-data"> 
                          <input type="hidden" class="form-control" name="host_id" value="<?=$host_id; ?>" >
                          <div class="row">
                            <label for="title" class="col-form-label" style="color: black;">Listing Title:</label>
                            <input type="text" class="form-control" name="title" placeholder="Input listing title" required>
                          </div>
                          <div class="row">
                            <label for="location_id" class="col-form-label" style="color: black;">Location:</label>
                            <select class="form-select" aria-label="Default select example" name="location_id" required>
                              <option selected>Choose house location</option>
                              <?php 
                              $queryL = "SELECT * FROM location";
                              $resultL = mysqli_query($link, $queryL);
                              while ($rowL = mysqli_fetch_array($resultL)){
                                extract($rowL);
                              ?>
                              <option value="<?= $location_id;?>"><?= $location ;?></option>
                              <?php
                              }
                              ?>
                          </select>
                          </div>
                          <div class="row">
                            <label for="address" class="col-form-label" style="color: black;">House Address:</label>
                            <input type="text" class="form-control" name="address" placeholder="Input house address" required>
                          </div>
                          <div class="row">
                            <label for="guest_num" class="col-form-label" style="color: black;">Guest Number:</label>
                            <input type="text" class="form-control" name="guest_num" placeholder="Type maximum guest number" required>
                          </div>
                          <div class="row">
                            <label for="bedroom_num" class="col-form-label" style="color: black;">Bedroom Number:</label>
                            <input type="text" class="form-control" name="bedroom_num" placeholder="Type bedroom number" required>
                          </div>
                          <div class="row">
                            <label for="livingroom_num" class="col-form-label" style="color: black;">Living Room Number:</label>
                            <input type="text" class="form-control" name="livingroom_num" placeholder="Type living room number" required>
                          </div>
                          <div class="row">
                            <label for="toilet_num" class="col-form-label" style="color: black;">Toilet Number:</label>
                            <input type="text" class="form-control" name="toilet_num" placeholder="Type toilet number" required>
                          </div>
                          <div class="row">
                            <label for="shower_num" class="col-form-label" style="color: black;">Shower Number:</label>
                            <input type="text" class="form-control" name="shower_num" placeholder="Type shower number" required>
                          </div>
                          <div class="row">
                            <label for="parking_num" class="col-form-label" style="color: black;">Car Park Number:</label>
                            <input type="text" class="form-control" name="parking_num" placeholder="Type car park number" required>
                          </div>
                          <div class="row">
                            <label for="price" class="col-form-label" style="color: black;">Price:</label>
                            <input type="text" class="form-control" name="price" placeholder="Price per night" required>
                          </div>
                          <div class="row">
                            <label for="pet" class="col-form-label" style="color: black;">Pet Friendly:</label>
                            <select class="form-select" aria-label="Default select example" name="pet" required>
                              <option value="YES" selected>YES</option>
                              <option value="NO">NO</option>
                            </select>
                          </div>
                          <div class="row">
                            <label for="wifi" class="col-form-label" style="color: black;">Wi-Fi:</label>
                            <select class="form-select" aria-label="Default select example" name="wifi" required>
                              <option value="YES" selected>YES</option>
                              <option value="NO">NO</option>
                            </select>
                          </div>
                          <div class="row">
                            <label for="kitchen" class="col-form-label" style="color: black;">Kitchen:</label>
                            <select class="form-select" aria-label="Default select example" name="kitchen" required>
                              <option value="YES" selected>YES</option>
                              <option value="NO">NO</option>
                            </select>
                          </div>
                          <div class="row">
                            <label for="tv" class="col-form-label" style="color: black;">TV:</label>
                            <select class="form-select" aria-label="Default select example" name="tv" required>
                              <option value="YES" selected>YES</option>
                              <option value="NO">NO</option>
                            </select>
                          </div>
                          <br>
                          <div class="row">
                            <label for="image_main" class="form-label">Add House Image:</label>
                            <input type="file" name="image_main" class="form-control" accept="image/jpeg, image/jpg, image/png" required>
                          </div>
                          <br>
                          <br>

                          <div class="row justify-content-center ">
                            <button type="submit" name="hostHouse" class="btn" style="background-color: #00FFF0;color:white;width:50%"><b>Add</b></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <!-----Host house modal end----->
            </div>
            <br>
           
            <div class="row">
             <div class="col">
             <table  class="table table-hover text-center align-middle" style="font-size: 12px;">
             <thead>
                <tr>
                  <th scope="col">House</th>
                  <th scope="col">Location</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
               <tbody>
               <?php 
               $queryH = "SELECT * FROM house WHERE host_id = '$host_id' ";
               $resultH = mysqli_query($link, $queryH);
               while ($rowH = mysqli_fetch_array($resultH)){
                 extract($rowH);
                 $house_id = $rowH['house_id'];
                 $location_id = $rowH['location_id'];
                 $status_id = $rowH['status_id'];
                 $image_main = $rowH['image_main'];
                 $title = $rowH['title'];
                 $price = $rowH['price'];
                 $guest_num = $rowH['guest_num'];
                 $bedroom_num = $rowH['bedroom_num'];
                 $livingroom_num = $rowH['livingroom_num'];
                 $toilet_num = $rowH['toilet_num'];
                 $shower_num = $rowH['shower_num'];
                 $parking_num = $rowH['parking_num'];
                 $pet= $rowH['pet'];
                 $wifi= $rowH['wifi'];
                 $kitchen= $rowH['kitchen'];
                 $tv= $rowH['tv'];


                 $queryL = "SELECT * From location WHERE location_id = '$location_id' ";
                 $resultL = mysqli_query($link, $queryL);
                 $rowL = mysqli_fetch_assoc($resultL);
                 extract($rowL);
                 $location = $rowL['location'];

                 $queryS = "SELECT * From house_status WHERE status_id = '$status_id' ";
                 $resultS = mysqli_query($link, $queryS);
                 $rowS = mysqli_fetch_assoc($resultS);
                 extract($rowS);
                 $status = $rowS['status'];
               ?>
              
               <tr>
                  <td><img src="upload/<?=$image_main; ?>" width="100"></td>
                  <td><?=$location; ?></td>
                  <td><?=$status; ?></td>
                  <td>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#addGallery<?=$house_id; ?>" title="edit gallery">
                      <span style="color:#00FFF0" ><i class="fas fa-images"></i></span>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" data-bs-toggle="modal" data-bs-target="#viewHouse<?=$house_id; ?>" title="view house" >
                      <span style="color:#00FFF0" ><i class="fas fa-eye"></i></span>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" data-bs-toggle="modal" data-bs-target="#editHouse<?=$house_id; ?>" title="edit house" >
                      <span style="color:#00FFF0" ><i class="fas fa-edit"></i></span>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="javascript: unhostHouse(<?= $house_id ;?>, <?=$host_id; ?>)" title="unhost house">
                      <span style="color: #C57055;"><i class="fas fa-window-close"></i></span>
                    </a>
                <!--add gallery modal-->
                <div class="modal fade" id="addGallery<?= $house_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Edit House Gallery</b></h5>
                        </div>
                        <br>
                        <div class="text-start" style="font-size: 15px;">
                        <div class="row">
                          <img src="upload/<?= $image_main ;?>" width="200">
                        </div>
                        <form method="post" action="addGalleryF.php" enctype="multipart/form-data">
                          <input name="house_id" type="hidden" value="<?= $house_id; ?>"> 
                          <input name="host_id" type="hidden" value="<?= $host_id; ?>"> 
                          <div class="row">
                            <label for="image_title" class="col-form-label" style="color: black;">Add Image Title:</label>
                            <input type="text" class="form-control" name="image_title"  required>
                          </div>
                          <div class="row">
                            <label for="image" class="form-label">Add House Image:</label>
                            <input type="file" name="image" class="form-control" accept="image/jpeg, image/jpg, image/png" required>
                          </div>
                          <br><br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="addGallery" class="btn" style="background-color: #00FFF0;color:white;width:50%"><b>Add</b></button>
                          </div>
                        </form>
                        </div>
                        <hr>
                        <div class="row"><b>Gallery</b></div>
                        <br>
                        <!--Display gallery -->
                        <div class="row">
                          <?php 
                          $queryG = "SELECT * FROM gallery WHERE house_id = '$house_id'";
                          $resultG = mysqli_query($link, $queryG);
                          while ($rowG = mysqli_fetch_array($resultG)){
                            extract($rowG);
                            $image_id = $rowG['image_id'];
                            $image = $rowG ['image'];
                            $image_title = $rowG['image_title'];
                          ?>
                          
                          <div class="col-4">
                            <div class="gallery" >
                            <!--JQuery light box plugin here-->  
                            <a class="image-link" href="upload/<?= $image ;?>" >
                              <img  src="upload/<?= $image ;?>" width="100"  >
                            </a>
                            <!--JQuery light box plugin here-->  
                            </div>
                            <div class="row">
                              <div class="col text-start"><span style="font-size: 10px;">
                                <?= $image_title ;?></span>
                              </div>
                              <div class="col text-end">
                                <a type="button" data-bs-toggle="collapse" href="#editImg<?= $image_id ;?>" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                                  <span style="font-size: 10px;color:#00FFF0;"><i class="fas fa-edit"></i></span>
                                </a>
                                &nbsp;
                                <a href="javascript:deleteImg(<?= $image_id; ?>, <?=$host_id;?>)">
                                  <span style="font-size: 10px;color:brown;"><i class="fas fa-trash-alt"></i></span>
                                </a>
                              </div>
                            </div>
                            
                            <div class="row"><br></div>
                          </div>
                          <!--edit gallery image -->
                          <div class="collapse" id="editImg<?= $image_id ;?>">
                            <div class="card card-body">
                              <div class="row text-center">
                                <b>Edit This Image</b>
                              </div>
                              <form method="post" action="editGalleryF.php" enctype="multipart/form-data">
                                <input name="image_id" type="hidden" value="<?= $image_id; ?>"> 
                                <input name="house_id" type="hidden" value="<?= $house_id; ?>"> 
                                <input name="host_id" type="hidden" value="<?= $host_id; ?>">
                                <div class="row" style="font-size: 15px;">
                                  <label for="image_title" class="col-form-label" style="color: black;">Edit Image Title:</label>
                                  <input type="text" class="form-control" name="image_title" value="<?= $image_title ;?>" required>
                                </div>
                                <div class="row" style="font-size: 15px;">
                                 <label for="image" class="form-label">Edit Image:</label>
                                 <input type="file" name="image" class="form-control" accept="image/jpeg, image/jpg, image/png">
                                </div>
                                <br>
                                <div class="row justify-content-center ">
                                  <button type="submit" name="editGallery" class="btn" style="background-color: #00FFF0;color:white;width:30%;"><b>Update</b></button>
                                </div>
                              </form>
                            </div>
                          </div>
                          <!--edit gallery image ends-->

                          <?php  
                          }
                        ?>
                        </div>
                        
                        <!--Display gallery -->
                      </div>
                    </div>
                  </div>
                </div>
             <!--add gallery modal-->
              <!--view house modal-->
              <div class="modal fade" id="viewHouse<?= $house_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid" style="width: 80px;">
                          <h5 style="color: black;"><b>View This House</b></h5>
                        </div>
                        <br>
                      <div class="text-start" style="font-size: 15px;">  
                        <div class="row">
                          <b><?= $title ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <img src="upload/<?= $image_main;?>" width="200">
                        </div>
                        <br>
                        <div class="row">
                          <b>Price/Per Night:&nbsp;$<?= $price ;?></b> 
                        </div>
                        <br>
                        <div class="row">
                          <b>Location :&nbsp;<?= $location ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>Guest Number :&nbsp;<?= $guest_num ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>Bedroom Number :&nbsp;<?= $bedroom_num ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>Living room Number :&nbsp;<?= $livingroom_num ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>Toilet Number :&nbsp;<?= $toilet_num ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>Shower Number :&nbsp;<?= $shower_num ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>Car park Number :&nbsp;<?= $parking_num ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>Pet Friendly :&nbsp;<?= $pet ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>Wi-Fi :&nbsp;<?= $wifi ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>Kitchen :&nbsp;<?= $kitchen ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <b>TV :&nbsp;<?= $tv ;?></b>
                        </div>
                      </div>
                        <hr>
                        <div class="row">
                          <b>Gallery</b>
                        </div>
                        <br>
                        <div class="row">
                          <?php 
                          $queryG = "SELECT * FROM gallery WHERE house_id = '$house_id'";
                          $resultG = mysqli_query($link, $queryG);
                          while ($rowG = mysqli_fetch_array($resultG)){
                            extract($rowG);
                            $image_id = $rowG['image_id'];
                            $image = $rowG ['image'];
                            $image_title = $rowG['image_title'];
                          ?>
                          
                          <div class="col-4">
                            <div class="gallery" >
                            <!--JQuery light box plugin here-->  
                              <a class="image-link" href="upload/<?= $image ;?>" >
                                <img  src="upload/<?= $image ;?>" width="100"  >
                              </a>
                            <!--JQuery light box plugin here-->  
                            </div>
                            <div class="row">
                              <div class="col"><span style="font-size: 10px;">
                                <?= $image_title ;?></span>
                              </div>
                            </div>
                          </div>
                          <?php  
                          }
                          ?>
                        </div>     
                      </div>
                    </div>
                  </div>
                </div>
                  <!--view house modal ends-->
                   <!--edit house modal -->
                <div class="modal fade" id="editHouse<?= $house_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid" style="width: 80px;">
                          <h5 style="color: black;"><b>Edit This House</b></h5>
                        </div>
                        <br>
                        <div class="text-start" style="font-size: 15px;font-weight:bold;">
                        <form method="post" action="editHouseF.php" enctype="multipart/form-data">
                          <input name="house_id" type="hidden" value="<?= $house_id; ?>"> 
                          <input name="host_id" type="hidden" value="<?= $host_id; ?>"> 
                          <div class="row">
                            <label for="title" class="col-form-label" style="color: black;">Listing Title:</label>
                            <input type="text" class="form-control" name="title" value="<?= $title ;?>" required>
                          </div>
                          <div class="row">
                            <label for="location_id" class="col-form-label" style="color: black;">Location:</label>
                            <select class="form-select" aria-label="Default select example" name="location_id" required>
                              
                              <?php 
                              $queryL = "SELECT * FROM location";
                              $resultL = mysqli_query($link, $queryL);
                              while ($rowL = mysqli_fetch_array($resultL)){
                                extract($rowL);
                                $location_id = $rowL['location_id'];
                              ?>
                              <option value="<?= $location_id;?>"  <?php if($location_id == $rowH['location_id'] ): ?> selected <?php endif; ?>><?= $location ;?></option>
                              <?php
                              }
                              ?>
                          </select>
                          </div>
                          <div class="row">
                            <label for="guest_num" class="col-form-label" style="color: black;">Guest Number:</label>
                            <input type="text" class="form-control" name="guest_num" value="<?= $guest_num ;?>" required>
                          </div>
                          <div class="row">
                            <label for="bedroom_num" class="col-form-label" style="color: black;">Bedroom Number:</label>
                            <input type="text" class="form-control" name="bedroom_num" value="<?= $bedroom_num ;?>" required>
                          </div>
                          <div class="row">
                            <label for="livingroom_num" class="col-form-label" style="color: black;">Living Room Number:</label>
                            <input type="text" class="form-control" name="livingroom_num" value="<?= $livingroom_num ;?>" required>
                          </div>
                          <div class="row">
                            <label for="toilet_num" class="col-form-label" style="color: black;">Toilet Number:</label>
                            <input type="text" class="form-control" name="toilet_num" value="<?= $toilet_num ;?>" required>
                          </div>
                          <div class="row">
                            <label for="shower_num" class="col-form-label" style="color: black;">Shower Number:</label>
                            <input type="text" class="form-control" name="shower_num" value="<?= $shower_num ;?>" required>
                          </div>
                          <div class="row">
                            <label for="parking_num" class="col-form-label" style="color: black;">Car Park Number:</label>
                            <input type="text" class="form-control" name="parking_num" value="<?= $parking_num ;?>" required>
                          </div>
                          <div class="row">
                            <label for="price" class="col-form-label" style="color: black;">Price:</label>
                            <input type="text" class="form-control" name="price" value="<?= $price ;?>" required>
                          </div>
                          <div class="row">
                            <label for="pet" class="col-form-label" style="color: black;">Pet Friendly:</label>
                            <select class="form-select" aria-label="Default select example" name="pet" required>
                              <option value="YES" <?php if ($pet == 'YES') echo 'selected' ?> >YES</option>
                              <option value="NO" <?php if ($pet == 'NO') echo 'selected' ?>>NO</option>
                            </select>
                          </div>
                          <div class="row">
                            <label for="wifi" class="col-form-label" style="color: black;">Wi-Fi:</label>
                            <select class="form-select" aria-label="Default select example" name="wifi" required>
                              <option value="YES" <?php if ($wifi == 'YES') echo 'selected' ?>>YES</option>
                              <option value="NO" <?php if ($wifi == 'NO') echo 'selected' ?>>NO</option>
                            </select>
                          </div>
                          <div class="row">
                            <label for="kitchen" class="col-form-label" style="color: black;">Kitchen:</label>
                            <select class="form-select" aria-label="Default select example" name="kitchen" required>
                              <option value="YES" <?php if ($kitchen == 'YES') echo 'selected' ?>>YES</option>
                              <option value="NO" <?php if ($kitchen == 'NO') echo 'selected' ?>>NO</option>
                            </select>
                          </div>
                          <div class="row">
                            <label for="tv" class="col-form-label" style="color: black;">TV:</label>
                            <select class="form-select" aria-label="Default select example" name="tv" required>
                              <option value="YES" <?php if ($tv == 'YES') echo 'selected' ?>>YES</option>
                              <option value="NO" <?php if ($tv == 'NO') echo 'selected' ?>>NO</option>
                            </select>
                          </div>
                          <br>
                          <div class="row">
                            <img src="upload/<?= $image_main ;?>" width="200">
                          </div>

                          <div class="row">
                            <label for="image_main" class="form-label">Edit House Image:</label>
                            <input type="file" name="image_main" class="form-control" accept="image/jpeg, image/jpg, image/png" >
                          </div>
                          <br>
                          <br>

                          <div class="row justify-content-center ">
                            <button type="submit" name="editHouse" class="btn" style="background-color: #00FFF0;color:white;width:50%"><b>Update</b></button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <!--edit house modal ends-->
                  </td>
               </tr>
               <?php
               }
               ?>
              </tbody>
             </table>
             </div>
            </div>    
        </div>

        <!--House section ends-->
        <!--Booking section-->
        <div id="hostB" >
          <div class="row">
             <div class="col">
               You have <?=$booking_num ;?> booking(s)
             </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
             <table  class="table table-hover text-center align-middle" style="font-size: 12px;">
              <thead>
                <tr>
                  <th scope="col">House</th>
                  <th scope="col">Main Guest</th>
                  <th scope="col">Check In</th>
                  <th scope="col">Check Out</th>
                  <th scope="col">View Booking</th>
                  <th scope="col">Process</th>
                </tr>
              </thead>
              <tbody>
                <?php
               
                while ($rowB = mysqli_fetch_array($resultB)){
                  extract($rowB);
                  $image_main = $rowB['image_main'];
                  $guest_name = $rowB['guest_name'];
                  $check_in = $rowB['check_in'];
                  $check_out = $rowB['check_out'];
                  $booking_id = $rowB['booking_id'];
                  $guest_num = $rowB['guest_num'];
                  $pet = $rowB['pet'];
                  $price = $rowB['price'];
                  $status_id = $rowB['status_id'];

                  $in = new DateTime("$check_in");
                  $out = new DateTime("$check_out");
                  $interval = $in -> diff($out);
                  $nights = $interval->days ;
                  $bill = $nights * $price;
                  
                ?>
                
                <tr>
                  <td><img src="upload/<?=$image_main; ?>" width="150"></td>
                  <td><?=$guest_name; ?></td>
                  <td><?=$check_in; ?></td>
                  <td><?=$check_out; ?></td>
                  <td>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#viewBooking<?= $booking_id; ?>" title="view booking">
                        <span style="color: #E9BC4B;" ><i class="fas fa-eye"></i></span>
                    </a>
<!--view booking modal-->
                <div class="modal fade" id="viewBooking<?= $booking_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="font-size: 15px;">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>View this booking</b></h5>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col"><b>Booking reference:</b></div>
                          <div class="col"><?=$booking_id; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>How many guests:</b></div>
                          <div class="col"><?=$guest_num; ?></div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-5"><b>With pet?</b></div>
                          <div class="col"><?=$pet; ?></div>
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
                   
                        
                      </div>
                    </div>
                  </div>
                </div>            
<!--view booking modal-->
                </td>
                <td>
                  <form method="POST" action="processBooking.php">
                    <input type="hidden" name="booking_id" value="<?=$booking_id ?>">
                    <input type="hidden" name="status_id" value="<?=$status_id ?>">
                    <input type="hidden" name="host_id" value="<?=$host_id ?>">
                    <button type="submit" class="btn" name="processBooking" style="background-color:#00FFF0;border:none;width: 100px;" <?php  if ($status_id == 3): ?> disabled <?php endif; ?>>       
                      <span style="color: white;font-size:12px;"><b>
                       
                        <?php if($status_id==1): ?>
                        Check In
                        <?php endif; ?>
                        <?php if($status_id==5): ?>
                        Check Out
                        <?php endif; ?>
                        <?php if($status_id==6): ?>
                        Charge Fee
                        <?php endif; ?>
                        <?php if($status_id==3): ?>
                        Complete
                        <?php endif; ?>
                      </b></span>
                    </button>
                  </form>
                </td>
                </tr>
                <?php
                }
                ?>
              </tbody>
             </table>
            </div>
        </div>
        </div>
        <!--Booking section ends-->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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
<script src="js/jquery.magnific-popup.min.js"></script> 
<script>
  function displayContent(id1, id2, idB1, idB2){
    document.getElementById(id1).style.display = "block";
    document.getElementById(id2).style.display = "none";
    document.getElementById(idB1).style.backgroundColor = "black";
    document.getElementById(idB2).style.backgroundColor = "white";
    document.getElementById(idB1).style.color = "white";
    document.getElementById(idB2).style.color = "black";
  }


function deleteImg(image_id, host_id) {
  if (confirm("Are you sure you want to delete this image?")) {
    window.location.href = "deleteImgF.php?imageId=" + image_id + "&hostId=" + host_id;
  }

}  
function unhostHouse(house_id, host_id) {
  if (confirm("Are you sure you want to unhost this house?")) {
    window.location.href = "unhostHouse.php?houseId=" + house_id + "&hostId=" + host_id;;
  }

}  
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