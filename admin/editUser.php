<?php 
include "../library/config.php";

if (isset($_POST['editUser'])) {
    $user_id = $_POST['user_id'];
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $role_id = mysqli_real_escape_string($link, $_POST['role']);
    
    $password_hash = password_hash($password,  PASSWORD_DEFAULT);

    $query = "UPDATE users SET name = '$name', email = '$email', password_hash = '$password_hash', role_id = '$role_id' WHERE user_id = '$user_id'";
    $result= mysqli_query($link, $query);

     
    if ($role_id == 1) {
        header("Location: guest.php");
    } else if ($role_id == 2){
        header("Location: host.php");
    }else if ($role_id == 3) {
        header("Location: index.php");
    }
    }

?>