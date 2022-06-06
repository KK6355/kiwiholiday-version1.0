<?php 
include "library/config.php";
include "library/image-creation.php";

if(isset($_POST['addGallery'])) {
    $house_id = $_POST['house_id'];
    $host_id = $_POST['host_id'];
    $image_title = mysqli_real_escape_string($link, $_POST['image_title']);
    if ( $_FILES['image']['tmp_name'] != "") {
        $imgName = $_FILES['image']['name'];
        $ext = strrchr($imgName, "."); //Finds the last occurrence of a string inside another string, string=> photoName, needle => "."
        $newName = md5(rand()*time()).$ext;
        $imgPath = HOUSE_IMG . $newName;
        $tmpName = $_FILES['image']['tmp_name'];
        createThumbnail($tmpName, $imgPath, HOUSE_IMG_WIDTH);
        
      } else{
        $newName = "";
      }
      $query = "INSERT INTO `gallery`( `house_id`, `image`, `image_title`) 
      VALUES ('$house_id','$newName','$image_title')";
      mysqli_query($link, $query);
      header("Location: hostCenter.php?hostId=".$host_id);

}

?>