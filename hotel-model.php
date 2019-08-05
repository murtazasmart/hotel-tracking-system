<?php
if(session_status() == 0) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/accomdation2");
}

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
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/accomdation2/dashboard");
}

function add() {
    require('config.php');
    if(isset($_POST['hotelName']) && isset($_POST['zone'])) {
        $hotelName = isset($_POST['hotelName']) ? $_POST['hotelName'] : "";
        $starRating = isset($_POST['starRating']) ? $_POST['starRating'] : "";
        $location = isset($_POST['location']) ? $_POST['location'] : "";
        $address = isset($_POST['address']) ? $_POST['address'] : "";
        $contactPerson = isset($_POST['contactPerson']) ? $_POST['contactPerson'] : "";
        $contactNo = isset($_POST['contactNo']) ? $_POST['contactNo'] : "";
        $zone = isset($_POST['zone']) ? $_POST['zone'] : "";
        $priceRange = isset($_POST['priceRange']) ? $_POST['priceRange'] : "";
    
        // CHECK FOR THE RECORD FROM TABLE
        $query = "INSERT INTO hotel(hotel_name, star_rating, location, address, contact, contact_person, zone, price_range, lastedit)" .
        "VALUES('$hotelName', '$starRating', '$location', '$address', '$contactNo', '$contactPerson', '$zone', '$priceRange', NOW());";
    
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        print_r($result);
        if ($result === TRUE) {
            echo "<script type='text/javascript'>alert('Success');</script>";
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/accomdation2/dashboard.php");
        } else {
            echo "aito";
            echo "<script type='text/javascript'>alert('Something went wrong');</script>";
            header("Location: ". $_SERVER['HTTP_REFERER'] );
            exit;
        }
    }
}

function edit() {
    require('config.php');
    if(isset($_POST['hotelName']) && isset($_POST['zone'])) {
        $hotelId = isset($_POST['hotelId']) ? $_POST['hotelId'] : "";
        $hotelName = isset($_POST['hotelName']) ? $_POST['hotelName'] : "";
        $starRating = isset($_POST['starRating']) ? $_POST['starRating'] : "";
        $location = isset($_POST['location']) ? $_POST['location'] : "";
        $address = isset($_POST['address']) ? $_POST['address'] : "";
        $contactPerson = isset($_POST['contactPerson']) ? $_POST['contactPerson'] : "";
        $contactNo = isset($_POST['contactNo']) ? $_POST['contactNo'] : "";
        $zone = isset($_POST['zone']) ? $_POST['zone'] : "";
        $priceRange = isset($_POST['priceRange']) ? $_POST['priceRange'] : "";

        // CHECK FOR THE RECORD FROM TABLE
        $query = "UPDATE hotel SET hotel_name = '$hotelName', star_rating = '$starRating', location = '$location', address = '$address', contact = '$contactNo', contact_person = '$contactPerson', zone = '$zone', price_range = '$priceRange', lastedit = NOW()" . 
        "WHERE hote_id = $hotelId";

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        print_r($result);
        if ($result === TRUE) {
            echo "<script type='text/javascript'>alert('Success');</script>";
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/accomdation2/dashboard.php");
        } else {
            echo "aito";
            echo "<script type='text/javascript'>alert('Something went wrong');</script>";
            header("Location: ". $_SERVER['HTTP_REFERER'] );
            exit;
        }
    }
}

function delete() {
    require('config.php');
    if(isset($_GET['id'])) {
        // CHECK FOR THE RECORD FROM TABLE
        $query1 = "DELETE FROM rooms WHERE hotel_id =" . $_GET['id'] . " ;";
        $query2 = "DELETE FROM hotel WHERE hotel_id =" . $_GET['id'] . " ;";
        
        $result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
        $count1 = mysqli_num_rows($result1);
        
        $result2 = mysqli_query($connection, $query2) or die(mysqli_error($connection));
        $count2 = mysqli_num_rows($result2);
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/accomdation2/dashboard.php");
    }
}


?>