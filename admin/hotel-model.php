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
    if(isset($_POST['hotelName']) && isset($_POST['zone'])) {
        $hotelName = isset($_POST['hotelName']) ? $_POST['hotelName'] : "";
        $starRating = isset($_POST['starRating']) ? $_POST['starRating'] : "";
        $location = isset($_POST['location']) ? $_POST['location'] : "";
        $address = isset($_POST['address']) ? $_POST['address'] : "";
        $contactPerson = isset($_POST['contactPerson']) ? $_POST['contactPerson'] : "";
        $contactNo = isset($_POST['contactNo']) ? $_POST['contactNo'] : "";
        $zone = isset($_POST['zone']) ? $_POST['zone'] : "";
        $priceRange = isset($_POST['priceRange']) ? $_POST['priceRange'] : "";
        $amenities = isset($_POST['amenities']) ? $_POST['amenities'] : "";
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";

        $img1 = uploadProductImage('img1', SRV_ROOT . 'images/');
        $img2 = uploadProductImage('img2', SRV_ROOT . 'images/');
        $img3 = uploadProductImage('img3', SRV_ROOT . 'images/');

        $pathImg1 = $img1['image'];
        $pathImg2 = $img2['image'];
        $pathImg3 = $img3['image'];

        // CHECK FOR THE RECORD FROM TABLE
        $query = "INSERT INTO hotel(hotel_name, star_rating, location, address, contact, contact_person, zone, price_range, amenities, username, password, lastedit, img1, img2, img3)" .
        "VALUES('$hotelName', '$starRating', '$location', '$address', '$contactNo', '$contactPerson', '$zone', '$priceRange', '$amenities', '$username', '$password', NOW(), '$pathImg1', '$pathImg2', '$pathImg3');";

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        print_r($result);
        if ($result === TRUE) {
            echo "<script type='text/javascript'>alert('Success');</script>";
            header("Location: $server_link");
        } else {
            echo "aito";
            echo "<script type='text/javascript'>alert('Something went wrong');</script>";
            header("Location: ". $_SERVER['HTTP_REFERER'] );
            exit;
        }
    }
}

function edit() {
    global $connection, $server_link;
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
        $amenities = isset($_POST['amenities']) ? $_POST['amenities'] : "";
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";

        // CHECK FOR THE RECORD FROM TABLE
        $query = "UPDATE hotel SET hotel_name = '$hotelName', star_rating = '$starRating', location = '$location', address = '$address', contact = '$contactNo', contact_person = '$contactPerson', zone = '$zone', price_range = '$priceRange', amenities = '$amenities', username = '$username', password = '$password', lastedit = NOW()" .
        "WHERE hotel_id = $hotelId";

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        //print_r($result);

        //let's upload images if there are any set
        if(is_uploaded_file($_FILES['img1']['tmp_name'])){
            $img1 = uploadProductImage('img1', SRV_ROOT . 'images/');
            $pathImg1 = $img1['image'];
            $sql_update_img1 = "UPDATE hotel SET img1 = '$pathImg1' WHERE hotel_id = $hotelId";
            $result = mysqli_query($connection, $sql_update_img1) or die(mysqli_error($connection));
        }

        //let's upload images if there are any set
        if(is_uploaded_file($_FILES['img2']['tmp_name'])){
            $img2 = uploadProductImage('img2', SRV_ROOT . 'images/');
            $pathImg2 = $img2['image'];
            $sql_update_img2 = "UPDATE hotel SET img2 = '$pathImg2' WHERE hotel_id = $hotelId";
            $result = mysqli_query($connection, $sql_update_img2) or die(mysqli_error($connection));
        }

        //let's upload images if there are any set
        if(is_uploaded_file($_FILES['img3']['tmp_name'])){
            $img3 = uploadProductImage('img3', SRV_ROOT . 'images/');
            $pathImg3 = $img3['image'];
            $sql_update_img3 = "UPDATE hotel SET img3 = '$pathImg3' WHERE hotel_id = $hotelId";
            $result = mysqli_query($connection, $sql_update_img3) or die(mysqli_error($connection));
        }

        if ($result === TRUE) {
            echo "<script type='text/javascript'>alert('Success');</script>";
            header("Location: $server_link");
        } else {
            echo "aito";
            echo "<script type='text/javascript'>alert('Something went wrong');</script>";
            header("Location: ". $_SERVER['HTTP_REFERER'] );
            exit;
        }
    }
}

function delete() {
    global $connection, $server_link;
    if(isset($_GET['id'])) {
        // CHECK FOR THE RECORD FROM TABLE
        $query1 = "DELETE FROM rooms WHERE hotel_id =" . $_GET['id'] . " ;";
        $query2 = "DELETE FROM hotel WHERE hotel_id =" . $_GET['id'] . " ;";

        $result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
        $count1 = mysqli_num_rows($result1);

        $result2 = mysqli_query($connection, $query2) or die(mysqli_error($connection));
        $count2 = mysqli_num_rows($result2);
        header("Location: $server_link");
    }
}

function uploadProductImage($inputName, $uploadDir)
{
    $image     = $_FILES[$inputName];
    $imagePath = '';
    $thumbnailPath = '';
    $thumbnailMidPath =  '';

    // if a file is given
    if (trim($image['tmp_name']) != '') {
        $ext = substr(strrchr($image['name'], "."), 1);

        // generate a random new file name to avoid name conflict
        $imagePath = md5(rand() * time()) . ".$ext";

        list($width, $height, $type, $attr) = getimagesize($image['tmp_name']);

        // make sure the image width does not exceed the
        // maximum allowed width
        if (LIMIT_PRODUCT_WIDTH && $width > MAX_PRODUCT_IMAGE_WIDTH) {
            $result    = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_PRODUCT_IMAGE_WIDTH);
            $imagePath = $result;
        } else {
            $result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
        }

        if ($result) {
            // create thumbnail
            $thumbnailPath =  md5(rand() * time()) . ".$ext";
            $thumbnailMidPath =  md5(rand() * time()) . ".$ext";
            $result = createThumbnail($uploadDir . $imagePath, $uploadDir . $thumbnailPath, THUMBNAIL_WIDTH);
            $resultMid = createThumbnail($uploadDir . $imagePath, $uploadDir . $thumbnailMidPath, 220); //width for mid image is always 220

            // create thumbnail failed, delete the image
            if (!$result) {
                unlink($uploadDir . $imagePath);
                $imagePath = $thumbnailPath = $thumnailMidPath = '';
            } else {
                $thumbnailPath = $result;
            }

            // create thumbnailmid failed, delete the image
            if (!$resultMid) {
                unlink($uploadDir . $imagePath);
                $imagePath = $thumbnailPath = $thumbnailMidPath = '';
            } else {
                $thumbnailMidPath = $resultMid;
            }
        } else {
            // the image cannot be upload / resized
            $imagePath = $thumbnailPath = $thumbnailMidPath = '';
        }

    }


    return array('image' => $imagePath, 'thumbnail' => $thumbnailPath, 'thumbnailMid' => $thumbnailMidPath);
}


?>