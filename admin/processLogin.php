<?php
require 'config.php';

if (isset($_POST['username']) && isset($_POST['password'])){
    // Assigning POST values to variables.
    $username = $_POST['username'];
    $password = $_POST['password'];

    // CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1){
        //echo "Login Credentials verified";
        $_SESSION["ac_accom_admin"] = $username;
        header("Location: $server_link/");
        exit();
    }else{
        //echo "Invalid Login Credentials";
        header("Location: $server_link/login.php");
        exit();
    }
}
?>