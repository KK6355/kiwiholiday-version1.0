<?php 
include "../library/config.php";
include "../library/image-creation.php";

if(isset($_POST['editGallery'])) {
    $image_id = $_POST['image_id'];
    $house_id = $_POST['house_id'];
    $image_title = mysqli_real_escape_string($link, $_POST['image_title']);
    if ( $_FILES['image']['tmp_name'] != "") {
        $imgName = $_FILES['image']['name'];
        $ext = strrchr($imgName, "."); //Finds the last occurrence of a string inside another string, string=> photoName, needle => "."
        $newName = md5(rand()*time()).$ext;
        $imgPath = HOUSE_IMG . $newName;
        $tmpName = $_FILES['image']['tmp_name'];
        createThumbnail($tmpName, $imgPath, HOUSE_IMG_WIDTH);
        $query = "UPDATE `gallery` SET `house_id`='$house_id',`image`='$newName',`image_title`='$image_title' WHERE image_id = '$image_id'";
      } else{
        $query = "UPDATE `gallery` SET `house_id`='$house_id',`image_title`='$image_title' WHERE image_id = '$image_id'";
      }
     
      mysqli_query($link, $query);
      header("Location: house.php");

}

?>