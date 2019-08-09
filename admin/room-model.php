<?php
require "config.php";
require "functions.php";

checkUser();

if (isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'add':
            add();
            break;
        case 'edit':
            edit();
            break;
        case 'delete':
            delete();
            break;
        default:
            header("Location: http://". $_SERVER['HTTP_REFERER'] );
            break;
    }
} else {
    header("Location: $server_link");
}

function add() {
    global $connection, $server_link;

    echo "we're here";
    if(isset($_POST['roomName'])) {
        $roomName = isset($_POST['roomName']) ? $_POST['roomName'] : "";
        $roomDescription = isset($_POST['roomDescription']) ? $_POST['roomDescription'] : "";
        $roomCount = isset($_POST['roomCount']) ? $_POST['roomCount'] : 0;
        $hotelId = isset($_GET['hotelId']) ? $_GET['hotelId'] : 0;


        // CHECK FOR THE RECORD FROM TABLE
        $query = "INSERT INTO rooms(hotel_id, room_name, room_description, available_count)" .
        "VALUES($hotelId, '$roomName', '$roomDescription', $roomCount);";

        echo $query;

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        print_r($result);
        if ($result === TRUE) {
            // echo "<script type='text/javascript'>alert('Success');</script>";
            header("Location: ". $_SERVER['HTTP_REFERER'] );
        } else {
            // echo "aito";
            // echo "<script type='text/javascript'>alert('Something went wrong');</script>";
            header("Location: ". $_SERVER['HTTP_REFERER'] );
            exit;
        }
    }
}

function edit() {
    global $connection, $server_link;
    if(isset($_POST['roomName'])) {
        $roomName = isset($_POST['roomName']) ? $_POST['roomName'] : "";
        $roomDescription = isset($_POST['roomDescription']) ? $_POST['roomDescription'] : "";
        $roomCount = isset($_POST['roomCount']) ? $_POST['roomCount'] : 0;
        $roomId = isset($_POST['roomId']) ? $_POST['roomId'] : 0;

        // CHECK FOR THE RECORD FROM TABLE
        $query = "UPDATE rooms SET room_name = '$roomName', room_description = '$roomDescription', available_count = '$roomCount'" .
        "WHERE room_id = $roomId";

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        print_r($result);
        if ($result === TRUE) {
            // echo "<script type='text/javascript'>alert('Success');</script>";
            header("Location: $server_link");
        } else {
            // echo "aito";
            // echo "<script type='text/javascript'>alert('Something went wrong');</script>";
            header("Location: ". $_SERVER['HTTP_REFERER'] );
            exit;
        }
    }
}

function delete() {
    global $connection, $server_link;
    if(isset($_GET['id'])) {
        // CHECK FOR THE RECORD FROM TABLE
        $query1 = "DELETE FROM rooms WHERE room_id =" . $_GET['id'] . " ;";

        $result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
        //$count1 = mysqli_num_rows($result1);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}


?>