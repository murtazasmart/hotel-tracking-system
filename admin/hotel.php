<?php

if (isset($_GET["type"]) && $_GET["type"] === "edit" && isset($_GET["id"])) {
  // CHECK FOR THE RECORD FROM TABLE
  $query = "select * from hotel WHERE hotel_id = " . $_GET['id'];

  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);
  $result = mysqli_fetch_assoc($result);
  if ($count === 1) {
    $hotelId = $result['hotel_id'];
    $hotelName = $result['hotel_name'];
    $starRating = $result['star_rating'];
    $location = $result['location'];
    $address = $result['address'];
    $contactPerson = $result['contact_person'];
    $contactNo = $result['contact'];
    $zone = $result['zone'];
    $priceRange = $result['price_range'];
    $amenities = $result['amenities'];
    $type = $result['type'];
    $distanceFromMasjid = $result['distance_from_masjid'];
    $website = $result['website'];
    $gmapslink = $result['gmapslink'];
    $username = $result['username'];
    $password = $result['password'];
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
  $amenities = "";
  $type = "";
  $distanceFromMasjid = "";
  $website = "";
  $gmapslink = "";
  $username = "";
  $password = "";
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
  $amenities = "";
  $type = "";
  $distanceFromMasjid = "";
  $website = "";
  $gmapslink = "";
  $username = "";
  $password = "";
}

?>
        <div class="row">
          <div class="col-12">
            <h1>Update Hotel Details</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          <form method="post" action="hotel-model.php?action=<?php echo $action; ?>" class="accom_form"  enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="hotelId" id="hotelId" value="<?php echo $hotelId; ?>">
          <h3 class="form-partition">Details</h3>
          <div class="form-group">
            <label>Hotel Name</label>
            <input type="text" class="form-control" name="hotelName" id="hotelName" value="<?php echo $hotelName; ?>">
          </div>
          <div class="form-group">
            <label>Accommodation Type</label>
            <select class="form-control" name="type" id="type">
              <option>Apartment</option>
              <option <?php if ($type== "Hotel") echo('selected="selected"'); ?>>Hotel</option>
            </select>
          </div>
          <div class="form-group">
            <label>Star rating</label>
            <input type="text" class="form-control" name="starRating" id="starRating" value="<?php echo $starRating; ?>">
          </div>
          <div class="form-group">
            <label >Location</label>
            <input type="text" class="form-control" name="location" id="location" value="<?php echo $location; ?>">
          </div>
          <div class="form-group">
            <label >Address</label>
            <input type="text" class="form-control" name="address" id="address" value="<?php echo $address; ?>">
          </div>
          <div class="form-group">
            <label >Contact Number</label>
            <input type="text" class="form-control" name="contactNo" id="contactNo" value="<?php echo $contactNo; ?>">
          </div>
          <div class="form-group">
            <label >Contact Person</label>
            <input type="text" class="form-control" name="contactPerson" id="contactPerson" value="<?php echo $contactPerson; ?>">
          </div>
          <div class="form-group">
            <label >Zone</label>
            <input type="text" class="form-control" name="zone" id="zone" value="<?php echo $zone; ?>">
          </div>
          <div class="form-group">
            <label >Price Range</label>
            <input type="text" class="form-control" name="priceRange" id="priceRange" value="<?php echo $priceRange; ?>">
          </div>
          <div class="form-group">
            <label >Amenities</label>
            <textarea type="text" class="form-control" name="amenities" id="amenities"><?php echo $amenities; ?></textarea>
          </div>
          <div class="form-group">
            <label >Distance from masjid</label>
            <textarea type="text" class="form-control" name="distanceFromMasjid" id="distanceFromMasjid"><?php echo $distanceFromMasjid; ?></textarea>
          </div>
          <div class="form-group">
            <label >Hotel/Apartment Website</label>
            <textarea type="text" class="form-control" name="website" id="website"><?php echo $website; ?></textarea>
          </div>
          <div class="form-group">
            <label >Google Maps Link</label>
            <textarea type="text" class="form-control" name="gmapslink" id="gmapslink"><?php echo $gmapslink; ?></textarea>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="img1" name="img1">
                  <label class="custom-file-label" for="img1">Image 1</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="img2" name="img2">
                  <label class="custom-file-label" for="img2">Image 2</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="img3" name="img3">
                  <label class="custom-file-label" for="img3">Image 3</label>
                </div>
              </div>
          </div>
          <h3 class="form-partition marg-top">Credentials</h3>
          <div class="form-group">
            <label >Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>">
          </div>
          <div class="form-group">
            <label >Password</label>
            <input type="text" class="form-control" name="password" id="password" value="<?php echo $password; ?>">
          </div>
          <div class="form-group">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
          </div>
        </div>