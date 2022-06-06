<?php
include "library/config.php";

if(isset($_POST['editFav'])){
  if(!isset($_SESSION['status'])){
   
    ?>
    <script>
   
  if (confirm( "Please Log In From Top Icon Firstly!")){
   window.location.href = "houseListing.php?" 
  } else {
    window.location.href = "houseListing.php?"  
   }
 
  
    </script>
<?php
} else {

  $house_id = $_POST['house_id'];

  $guest_id = $_SESSION['user_id'];
  
  
  $this_fav_num = $_POST['this_fav_num'];

  if ( $this_fav_num == 0){
  $queryAf = "INSERT INTO `favourite`( `house_id`, `guest_id`)
   VALUES ('$house_id','$guest_id')";
  $resultAf = mysqli_query($link, $queryAf);
} else {
  $queryDf = "DELETE FROM `favourite` WHERE house_id = '$house_id' AND guest_id = '$guest_id'";
  $resultDf = mysqli_query($link, $queryDf);
}
 
    header("Location: houseListing.php");


}
}

?>
