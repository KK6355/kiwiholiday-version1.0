      <br>
      <br>
      <br>  
      <div class="row">
          <div class="col float-start">
              <a href="../index.php">
                <img src="../image/logo.png" width="50px" class="img-fluid" alt="logo">
              </a>
          </div>
          <div class="col text-end dropdown">
              <a class="btn dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" >
                <span style="font-size: 40px;color:#00FFF0;">
                  <i class="fas fa-user-circle"></i>
                </span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                <li><a class="dropdown-item" type="button" >Hi, <?= $_SESSION['name'] ?></a></li>
                <li><a class="dropdown-item" type="button" href="../library/logout.php">Log Out</a></li>
              </ul>
          </div>
      </div>
      <br>
      <br>