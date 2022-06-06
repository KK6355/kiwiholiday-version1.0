<?php 
include "../library/config.php";
include "../library/image-creation.php";
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
    <link rel="stylesheet" href="../css/magnific-popup.css">
    

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
                <a href="house.php" style="text-decoration: none;color:#E9BC4B;">House Management</a>
                <a href="booking.php" style="text-decoration: none;color:white;">Booking Management</a>
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
                <h4><b>House Overview</b></h4>
              </div>
              <div class="col text-end">
                <a type="button" data-bs-toggle="modal" data-bs-target="#addHouse" title="add house">
                <span style="font-size: 25px;color:#C2E27C;"><i class="fas fa-house-user"></i><b>+</b></span>
                </a>
              </div>
              <!-----Add house modal----->
              <div class="modal fade" id="addHouse" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="../image/logo.png" class="img-fluid" style="width: 80px;">
                          <h5 style="color: black;"><b>Add A House</b></h5>
                        </div>
                        <br>
                        <form method="post" action="addHouse.php" enctype="multipart/form-data">
                          <div class="row">
                            <label for="host_id" class="col-form-label" style="color: black;">Host ID:</label>
                            <input type="text" class="form-control" name="host_id" placeholder="Input host id" required>
                          </div>
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
                          <div class="row">
                            <label for="status_id" class="col-form-label" style="color: black;">Status:</label>
                            <select class="form-select" aria-label="Default select example" name="status_id" required>
                              <option selected>Choose house status:</option>
                              <?php 
                              $queryS = "SELECT * FROM house_status";
                              $resultS = mysqli_query($link, $queryS);
                              while ($rowS = mysqli_fetch_array($resultS)){
                                extract($rowS);
                              ?>
                              <option value="<?= $status_id;?>"><?= $status ;?></option>
                              <?php
                              }
                              ?>
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
                            <button type="submit" name="addHouse" class="btn" style="background-color: #00FFF0;color:white;width:50%"><b>Add</b></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <!-----Add house modal end----->    
            </div>
            <br>
            <div class="row">
            <table  class="table table-hover text-center align-middle" style="font-size: 12px;">
              <thead style="background-color:black;color:white;">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Image</th>
                  <th scope="col">Host_id</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = "SELECT house.house_id, house.host_id, house.image_main,house.location_id, house_status.status
                          FROM house
                          INNER JOIN house_status ON house.status_id = house_status.status_id";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)){

                  $house_id = $row['house_id'];
                  $host_id = $row['host_id'];
                  $image_main = $row['image_main'];
                  $location_id = $row['location_id'];
                  $status = $row['status'];
                ?>
                
                <tr>
                  <th scope="row"><?= $house_id ;?></th>
                  <td><img src="../upload/<?= $image_main ;?>" width="100"></td>
                  <td><?= $host_id ;?></td>
                  <td><?= $status ;?></td>
                  <td>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#addGallery<?= $house_id; ?>" title="manage gallery" >
                      <span style="color: #E9BC4B;" ><i class="fas fa-images"></i></span>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" data-bs-toggle="modal" data-bs-target="#viewHouse<?= $house_id; ?>" title="view house" >
                      <span style="color: #E9BC4B;" ><i class="fas fa-eye"></i></span>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" data-bs-toggle="modal" data-bs-target="#editHouse<?= $house_id; ?>" title="edit house">
                      <span style="color: #E9BC4B;" ><i class="fas fa-edit"></i></span>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="javascript: deleteHouse(<?= $house_id ;?>)" title="delete house">
                      <span style="color: #C57055;"><i class="fas fa-trash-alt"></i></span>
                    </a>
                  </td>
                  <!--view house modal-->
                <div class="modal fade" id="viewHouse<?= $house_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="../image/logo.png" class="img-fluid" style="width: 80px;">
                          <h5 style="color: black;"><b>View This House</b></h5>
                        </div>
                        <br>
                        <?php
                        $queryH = "SELECT * FROM house INNER JOIN location ON house.location_id = location.location_id
                        WHERE house_id = '$house_id'";
                        $resultH = mysqli_query($link, $queryH);
                        $rowH = mysqli_fetch_assoc($resultH); 
                        extract($rowH);
                        $title = $rowH['title'];
                        $image_main = $rowH['image_main']; 
                        $price = $rowH['price'];
                        $location = $rowH['location'];
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
                        $status_id = $rowH['status_id'];
                        
                        ?>
                        <div class="row">
                          <b><?= $title ;?></b>
                        </div>
                        <br>
                        <div class="row">
                          <img src="../upload/<?= $image_main;?>" width="200">
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
                              <a class="image-link" href="../upload/<?= $image ;?>" >
                                <img  src="../upload/<?= $image ;?>" width="100"  >
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
                          <img src="../image/logo.png" class="img-fluid" style="width: 80px;">
                          <h5 style="color: black;"><b>Edit This House</b></h5>
                        </div>
                        <br>
                        <form method="post" action="editHouse.php" enctype="multipart/form-data">
                          <input name="house_id" type="hidden" value="<?= $house_id; ?>"> 
                          <div class="row">
                            <label for="host_id" class="col-form-label" style="color: black;">Host ID:</label>
                            <input type="text" class="form-control" name="host_id" value="<?= $host_id ;?>" required>
                          </div>
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
                              ?>
                              <option value="<?= $location_id;?>"  <?php if($location_id == $row['location_id']): ?> selected <?php endif; ?>><?= $location ;?></option>
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
                          <div class="row">
                            <label for="status_id" class="col-form-label" style="color: black;">Status:</label>
                            <select class="form-select" aria-label="Default select example" name="status_id" required>
                              
                              <?php 
                              $queryS = "SELECT * FROM house_status";
                              $resultS = mysqli_query($link, $queryS);
                              while ($rowS = mysqli_fetch_array($resultS)){
                                extract($rowS);
                              ?>
                              <option value="<?= $status_id;?>"  <?php if($status_id == $rowH['status_id']): ?> selected <?php endif; ?>><?= $status ;?></option>
                              <?php
                              }
                              ?>
                          </select>
                          </div>
                          <br>
                          <div class="row">
                            <img src="../upload/<?= $image_main ;?>" width="200">
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
                  <!--edit house modal ends-->

                  <!--add gallery modal-->
                <div class="modal fade" id="addGallery<?= $house_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="../image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Edit House Gallery</b></h5>
                        </div>
                        <br>
                        <div class="text-start" style="font-size: 15px;">
                        <div class="row">
                          <img src="../upload/<?= $image_main ;?>" width="200">
                        </div>
                        <form method="post" action="addGallery.php" enctype="multipart/form-data">
                          <input name="house_id" type="hidden" value="<?= $house_id; ?>"> 
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
                            <a class="image-link" href="../upload/<?= $image ;?>" >
                              <img  src="../upload/<?= $image ;?>" width="100"  >
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
                                <a href="javascript:deleteImg(<?= $image_id; ?>)">
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
                              <form method="post" action="editGallery.php" enctype="multipart/form-data">
                                <input name="image_id" type="hidden" value="<?= $image_id; ?>"> 
                                <input name="house_id" type="hidden" value="<?= $house_id; ?>"> 
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
<script src="../js/jquery.magnific-popup.min.js"></script>
<script>
function deleteImg(image_id) {
  if (confirm("Are you sure you want to delete this image?")) {
    window.location.href = "deleteImg.php?imageId=" + image_id;
  }

}  
function deleteHouse(house_id) {
  if (confirm("Are you sure you want to delete this house?")) {
    window.location.href = "deleteHouse.php?houseId=" + house_id;
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