<?php

if(session_status() == 0) {
  header("Location: http://" . $_SERVER['HTTP_HOST'] . "/accomdation2");
}
require('config.php');

if (isset($_GET["type"]) && $_GET["type"] === "edit" && isset($_GET["id"])) {
  // CHECK FOR THE RECORD FROM TABLE
  $query = "select * from hotel WHERE hotel_id = " . $_GET['id'];

  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);
  $result = mysqli_fetch_assoc($result);
  if ($count === 1) {
    $hotelName = $result['hotel_id'];
    $hotelName = $result['hotel_name'];
    $starRating = $result['star_rating'];
    $location = $result['location'];
    $address = $result['address'];
    $contactPerson = $result['contact_person'];
    $contactNo = $result['contact'];
    $zone = $result['zone'];
    $priceRange = $result['price_range'];
    $action = "edit";
  }
} else if (isset($_GET["type"]) && $_GET["type"] === "add") {
  $hotelId = "";
  $hotelName = "";
  $starRating = "";
  $location = "";
  $address = "";
  $contactPerson = "";
  $contactNo = "";
  $zone = "";
  $priceRange = "";
  $action = "add";
} else {
  $hotelName = "";
  $starRating = "";
  $location = "";
  $address = "";
  $contactPerson = "";
  $contactNo = "";
  $zone = "";
  $priceRange = "";
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <form method="post" action="hotel-model.php?action=<?php echo $action; ?>">
        <div class="form-group">
            <input type="hidden" class="form-control" name="hotelId" id="hotelId" value="<?php echo $hotelId; ?>">
            <label>Hotel Name</label>
            <input type="text" class="form-control" name="hotelName" id="hotelName" value="<?php echo $hotelName; ?>">
            <label>Star rating</label>
            <input type="text" class="form-control" name="starRating" id="starRating" value="<?php echo $starRating; ?>">
            <label >Location</label>
            <input type="text" class="form-control" name="location" id="location" value="<?php echo $location; ?>">
            <label >Address</label>
            <input type="text" class="form-control" name="address" id="address" value="<?php echo $address; ?>">
            <label >Contact Number</label>
            <input type="text" class="form-control" name="contactNo" id="contactNo" value="<?php echo $contactNo; ?>">
            <label >Contact Person</label>
            <input type="text" class="form-control" name="contactPerson" id="contactPerson" value="<?php echo $contactPerson; ?>">
            <label >Zone</label>
            <input type="text" class="form-control" name="zone" id="zone" value="<?php echo $zone; ?>">
            <label >Price Range</label>
            <input type="text" class="form-control" name="priceRange" id="priceRange" value="<?php echo $priceRange; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>