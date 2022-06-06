<?php 
include "library/config.php";


if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryS = "SELECT * FROM users WHERE email = '$email'";
    $resultS = mysqli_query($link, $queryS);
    $rowS = mysqli_fetch_assoc($resultS);
    extract($rowS);
    $password_hash = $rowS['password_hash'];
    $role_id = $rowS['role_id'];
    $user_id = $rowS['user_id'];
    $name = $rowS['name'];
    if (password_verify($password, $password_hash) && mysqli_num_rows($resultS) > 0){
        session_regenerate_id();
        $_SESSION['status'] = TRUE;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['name'] = $name;
        $_SESSION['role_id'] = $role_id;
        $_SESSION['user_id'] = $user_id;

        if($role_id == 3){
            header("Location: admin/index.php");
        }
        else if($role_id == 1){
            header("Location: guestCenter.php?guestId=".$user_id);
        }
        else if($role_id == 2){

            header("Location: hostCenter.php?hostId=".$user_id);
        }



    } else {
     
?>
        <script>
       
       if (confirm( "Please check your email or password and login again!")){
        window.location = "index.php"; 
       } else {
        window.location = "index.php"; 
       }
        </script>
<?php
        
        

    }

}








?>

