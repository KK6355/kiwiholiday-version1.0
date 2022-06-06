<?php 
include "../library/config.php";
$error_email = "";
$error_password = "";
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
                <a href="guest.php" style="text-decoration: none;color:#E9BC4B;">Guest Management</a>
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
          <div class="col col-lg-8 " style="padding-left: 50px;" >
            <div class="row">
              <div class="col text-start">
                <h4><b>Guest Overview</b></h4>
              </div>
              <div class="col text-end">
                <a type="button" data-bs-toggle="modal" data-bs-target="#addUserModal" title="add guest">
                  <span style="font-size: 25px;color:#E9BC4B;"><i class="fas fa-user-plus"></i></span>
                </a>        
              </div>
              <!-----Add user modal----->
              <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="../image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Add A Guest</b></h5>
                        </div>
                        <br>
                        <form method="post" action="addUser.php" enctype="multipart/form-data">
                          <div class="row">
                            <label for="name" class="col-form-label" style="color: black;">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Full name" required>
                          </div>
                          <div class="row">
                            <label for="email" class="col-form-label" style="color: black;">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="abc@abc.com" required >
                            <small  class="form-text text-muted"><?php echo $error_email; ?></small>
                          </div>
                          <div class="row">
                            <label for="password" class="col-form-label" style="color: black;">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="set your password here..." required >
                            
                          </div>
                          <div class="row">
                            <label for="passwordConfirm" class="col-form-label" style="color: black;">Confirm Password:</label>
                            <input type="password" class="form-control" name="passwordConfirm" placeholder="repeat password here..." required >
                            <small class="form-text text-muted"><?php echo $error_password; ?></small>
                          </div>
                          <div class="row">
                            <label for="role" class="col-form-label" style="color: black;">Add As:</label>
                            <select class="form-select" aria-label="Default select example" name="role" required>
                              <option selected>Choose user role</option>
                              <?php 
                              $query = "SELECT * FROM user_role";
                              $result = mysqli_query($link, $query);
                              while ($row = mysqli_fetch_array($result)){
                                extract($row);
                              ?>
                              <option value="<?= $role_id;?>"><?= $role ;?></option>
                              <?php
                              }
                              ?>
                          </select>
                          </div>
                          <br>
                          <br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="addUser" class="btn" style="background-color: #00FFF0;color:white;width:50%"><b>Add</b></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <!-----Add user modal ends----->    
            </div>
            <br>
            <div class="row">
            <table  class="table table-hover text-center " style="font-size: 12px;">
              <thead style="background-color:black;color:white;">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Booking</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $query = "SELECT * FROM users WHERE role_id = 1 ";
              $result = mysqli_query($link, $query);
              while ($row = mysqli_fetch_array($result)){
                $user_id = $row['user_id'];
                $name = $row['name'];
                $email = $row['email'];
              ?>
                <tr>
                  <th scope="row"><?= $user_id; ?></th>
                  <td><?= $name; ?></td>
                  <td><?= $email; ?></td>
                  <td>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#viewBooking<?= $user_id; ?>" title="view booking" >
                      <span style="font-size: 15px;color: #E858BF;"><i class="fas fa-bell"></i></span>
                    </a>
                  </td>
                  <td>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#editmodal<?= $user_id; ?>" title="edit user" >
                      <span style="color: #E9BC4B;" ><i class="fas fa-edit"></i></span>
                    </a>
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="javascript:deleteGuest(<?= $user_id; ?>)" title="delete user">
                      <span style="color: #C57055;"><i class="fas fa-user-minus"></i></span>
                    </a>
                  
                <!--edit user modal-->
                 <div class="modal fade" id="editmodal<?= $user_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="../image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Edit Guest Info</b></h5>
                        </div>
                        <br>
                        <div class="text-start" style="font-size: 15px;">
                        <form method="post" action="editUser.php" enctype="multipart/form-data">
                          <input name="user_id" type="hidden" value="<?= $user_id; ?>"> 
                          <div class="row">
                            <label for="name" class="col-form-label" style="color: black;">Name:</label>
                            <input type="text" class="form-control" name="name" value="<?= $name ;?>" required>
                          </div>
                          <div class="row">
                            <label for="email" class="col-form-label" style="color: black;">Email:</label>
                            <input type="email" class="form-control" name="email" value="<?= $email ;?>" required >
                          </div>
                          <div class="row">
                            <label for="password" class="col-form-label" style="color: black;">Reset Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Input new password" required >
                          </div>
                          <div class="row">
                            <label for="role" class="col-form-label" style="color: black;">Add As:</label>
                            <select class="form-select" aria-label="Default select example" name="role" required>
                            <?php 
                              $queryR = "SELECT * FROM user_role";
                              $resultR = mysqli_query($link, $queryR);
                              while ($rowR = mysqli_fetch_array($resultR)){
                                extract($rowR);
                              ?>
                              <option value="<?= $role_id;?>"  <?php if($role_id == 1): ?> selected <?php endif;?> ><?= $role ;?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <br>
                          <br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="editUser" class="btn" style="background-color: #00FFF0;color:white;width:50%"><b>Update</b></button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--edit user modal-->
                       <!--view user booking-->
                       <div class="modal fade" id="viewBooking<?= $user_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="../image/logo.png" class="img-fluid" style="width: 80px;">
                          <h5 style="color: black;"><b>Booking Under The Guest</b></h5>
                        </div>
                        <br>
                        
                        <div class="row">
                          <table  class="table table-hover text-center align-middle" style="font-size: 12px;">
                           <thead style="background-color:black;color:white;">
                              <tr>
                                <th scope="col">Booking Id</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Status</th>
                              </tr>
                           </thead>
                          <tbody>
                        <?php
                         $queryBookingList = "SELECT * FROM booking WHERE guest_id = '$user_id' AND status_id !=4 ";
                         $resultBookingList = mysqli_query($link, $queryBookingList);
                         $bookingCount = mysqli_num_rows($resultBookingList);
                         if($bookingCount == 0): 
                         ?>
                          <td><b>No Record!</b></td>
                         <?php else: 
                         while ($rowBookingList= mysqli_fetch_array($resultBookingList)){
                           extract($rowBookingList);
                           $booking_id = $rowBookingList['booking_id'];
                           $check_in = $rowBookingList['check_in'];
                           $check_out = $rowBookingList['check_out'];
                           $status_id = $rowBookingList['status_id'];

                           $queryS = "SELECT * FROM booking_status WHERE status_id = '$status_id' ";
                           $resultS = mysqli_query($link, $queryS);
                           $rowS = mysqli_fetch_array($resultS);
                           extract($rowS);
                           $status = $rowS['status'];
                        ?>
                          <tr>
                           <th scope="row"><?= $booking_id ;?></th>
                           <td><?=$check_in; ?></td>
                           <td><?= $check_out;?></td>
                           <td><?= $status ;?></td>
                          </tr>

                        <?php
                         }
                        endif; ?>
                          </tbody>
                        </table>
                        </div>
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!--view user booking-->
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
function deleteGuest(user_id) {
  if (confirm("Are you sure you want to delete this guest? The related booking and review will be deleted as well!")) {
    window.location.href = "deleteGuest.php?userId=" + user_id;
  }

}  
</script>
</body>
</html>