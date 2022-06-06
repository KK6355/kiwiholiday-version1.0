       <div id="topNavi" style="color: black;font-weight:bold;">

            <ul class="nav justify-content-center">
                <img src="image/logo.png" style="padding-right: 250px;height:100%;">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="houseListing.php">Book a holiday house</a>
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
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                   <li><a class="dropdown-item" type="button" >Hi, <?= $_SESSION['name'] ?></a></li>
                   <li><a class="dropdown-item" type="button" href="library/logout.php">Log Out</a></li>
                 </ul>
                </div>
            </ul>   
        </div>