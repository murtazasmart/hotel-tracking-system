<?php
if(session_status() == 1) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/accomdation2/dashboard.php");
}
require('config.php');
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
        session_start();
        $_SESSION["username"] = $username;
        echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
        header('Location: http://localhost/accomdation2/dashboard.php');
    }else{
        echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
        //echo "Invalid Login Credentials";
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/accomdation2");
    }
}
?>