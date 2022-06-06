<?php 
include "../library/config.php";
$error_email = "";
$error_password = "";

if (isset($_POST['addUser'])){

    $name = mysqli_real_escape_string($link, $_POST["name"]);
    $email = mysqli_real_escape_string($link, $_POST["email"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);
    $passwordConfirm = mysqli_real_escape_string($link, $_POST["passwordConfirm"]);
    $role_id = mysqli_real_escape_string($link, $_POST["role"]);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * From users WHERE email = '$email' ";
    $result = mysqli_query($link, $query);
    $rowCount = mysqli_num_rows($result);

    if($rowCount > 0){
        $error_email = "This email already exists. Please choose another one.";
    } else {
        if($password == $passwordConfirm){
            $query = "INSERT INTO users (name, email, password_hash, role_id) VALUES ('$name', '$email', '$password_hash', '$role_id') ";
            $result = mysqli_query($link, $query);
           
        } else {
            $error_password = "Passwords do not match";
        }
    }
    if ($role_id == 1) {
        header("Location: guest.php");
    } else if ($role_id == 2){
        header("Location: host.php");
    }else if ($role_id == 3) {
        header("Location: index.php");
    }
    
}
    
    
  
    
   

?>

