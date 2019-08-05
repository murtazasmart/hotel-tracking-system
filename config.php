<?php    

    $user = 'root';
    $pass = '';
    $db = 'accommodation';
    $connection = new mysqli('localhost', $user, $pass, $db) or die ("Unable to connect to DB");

    $server_link = $_SERVER['HTTP_HOST'] . "/hotel_tracking";

?>
