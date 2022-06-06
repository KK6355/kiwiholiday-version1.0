<?php 
include "../library/config.php";
include "../library/image-creation.php";

if(isset($_POST['addHouse'])) {
    $host_id = mysqli_real_escape_string($link, $_POST['host_id'] );
    $title = mysqli_real_escape_string($link, $_POST['title'] );
    $location_id = mysqli_real_escape_string($link, $_POST['location_id'] );
    $guest_num = mysqli_real_escape_string($link, $_POST['guest_num'] );
    $bedroom_num = mysqli_real_escape_string($link, $_POST['bedroom_num'] );
    $livingroom_num = mysqli_real_escape_string($link, $_POST['livingroom_num'] );
    $toilet_num = mysqli_real_escape_string($link, $_POST['toilet_num'] );
    $shower_num = mysqli_real_escape_string($link, $_POST['shower_num'] );
    $parking_num = mysqli_real_escape_string($link, $_POST['parking_num'] );
    $pet = mysqli_real_escape_string($link, $_POST['pet'] );
    $wifi = mysqli_real_escape_string($link, $_POST['wifi'] );
    $kitchen = mysqli_real_escape_string($link, $_POST['kitchen'] );
    $tv = mysqli_real_escape_string($link, $_POST['tv'] );
    $price = mysqli_real_escape_string($link, $_POST['price'] );
    $status_id = mysqli_real_escape_string($link, $_POST['status_id'] );

    if ( $_FILES['image_main']['tmp_name'] != "") {
        $imgName = $_FILES['image_main']['name'];
        $ext = strrchr($imgName, "."); //Finds the last occurrence of a string inside another string, string=> photoName, needle => "."
        $newName = md5(rand()*time()).$ext;
        $imgPath = HOUSE_IMG . $newName;
        $tmpName = $_FILES['image_main']['tmp_name'];
        createThumbnail($tmpName, $imgPath, HOUSE_IMG_WIDTH);
        
      } else{
        $newName = "";
      }
      $query = "INSERT INTO `house` (`title`,`image_main`, `host_id`, `location_id`, `guest_num`, `bedroom_num`, `livingroom_num`, `toilet_num`, `shower_num`, `parking_num`, `pet`, `wifi`, `kitchen`, `tv`, `price`, `status_id`)
       VALUES ('$title','$newName', '$host_id', '$location_id', '$guest_num', '$bedroom_num', '$livingroom_num', '$toilet_num', '$shower_num', '$parking_num', '$pet', '$wifi', '$kitchen', '$tv', '$price', '$status_id')";
      mysqli_query($link,$query);
      header("Location: house.php");
}











?>