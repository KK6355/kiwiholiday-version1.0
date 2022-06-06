  <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                    
        <?php 
        if(isset( $_SESSION['status']) ):
        ?>
        <li><a class="dropdown-item" type="button" >Hi, <?= $_SESSION['name'] ?></a></li>
        <?php if($_SESSION['role_id'] == 1): ?>
        <li><a class="dropdown-item" type="button" href="guestCenter.php?guestId=<?=$_SESSION['user_id'];?>" >Guest Center</a></li>
        <?php
        endif; 
        ?>
        <?php if($_SESSION['role_id'] == 2): ?>
        <li><a class="dropdown-item" type="button" href="hostCenter.php?hostId=<?=$_SESSION['user_id'];?>" >Host Center</a></li>
        <?php
        endif; 
        ?>
        <?php if($_SESSION['role_id'] == 3): ?>
        <li><a class="dropdown-item" type="button" href="admin/index.php" >Admin Access</a></li>
        <?php
        endif; 
        ?>
        <li><a class="dropdown-item" type="button" href="library/logout.php">Log Out</a></li>
        <?php else: ?>
        <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</a></li>
        <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#signUpModal">Register as host</a></li>
        <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#signUpModal">Register as guest</a></li>
        <?php
        endif; 
        ?>
  </ul>
        <!-----Log in modal----->
<div class="modal fade text-start" id="loginModal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Welcom to Kiwi Holiday</b></h5>
                        </div>
                        <br>
                        <form method="post" action="login.php" enctype="multipart/form-data">
                 
                          <div class="row">
                            <label for="email" class="col-form-label" style="color: black;">Email:</label>
                            <input type="email" class="form-control" name="email"  id="email">
                          </div>
                          <div class="row">
                            <label for="password" class="col-form-label" style="color: black;">Password:</label>
                            <input type="password" class="form-control" name="password"  id="password">
                          </div>
                          <br>
                          <br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="login" class="btn" style="background-color: #00FFF0;color:white;width:50%"><b>Log In</b></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
<!-----Log in modal----->
<!-----Sign Up modal----->
<div class="modal fade text-start" id="signUpModal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body" style="padding: 50px;">
                        <div class="row justify-content-end">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row justify-content-center text-center gy-2">
                          <img src="image/logo.png" class="img-fluid " style="width: 80px;">
                          <h5 style="color: black;"><b>Welcom to Kiwi Holiday</b></h5>
                        </div>
                        <br>
                        <form method="post" action="signUp.php" enctype="multipart/form-data">
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
                            <label for="role" class="col-form-label" style="color: black;">Register As:</label>
                            <select class="form-select" aria-label="Default select example" name="role" required>
                              <option selected>Choose your role</option>
                              <option value="1">Guest</option>
                              <option value="2">Host</option>
                          </select>
                          </div>
                          <br>
                          <br>
                          <div class="row justify-content-center ">
                            <button type="submit" name="AddUser" class="btn"  style="background-color: #00FFF0;color:white;width:50%"><b>Sign Up</b></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>            
<!-----Sign Up modal----->