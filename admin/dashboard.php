<?php

// CHECK FOR THE RECORD FROM TABLE
$query = "select * from hotel";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

?>
    <div class="row">
        <div class="col-12">
            <a class="btn btn-success" href="./index.php?view=hotel&type=add" role="button">Add</a>
            <a class="btn btn-primary" href="./logout.php" role="button">Logout</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <table id="hotels" class="table table-striped table-hover">
          <thead class="thead-dark">
              <tr>
                  <th>Hotel</th>
                  <th>Type</th>
                  <th>Star</th>
                  <th>Location</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Zone</th>
                  <th>Price Range</th>
                  <th>Amenities</th>
                  <th>Distance From Masjid</th>
                  <th>Last Edit</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
<?php
  while($res = mysqli_fetch_array($result)) {
      ?>
              <tr>
                  <td scope="row" align="center" class="">
                    <?php if($res['img1'] != ''){ ?> <img src="../images/<?php echo $res['img1']; ?>" class="img-fluid" /> <?php } ?>
                    <!--<?php if($res['img2'] != ''){ ?> <img src="../images/<?php echo $res['img2']; ?>" class="img-fluid" /> <?php } ?>
                    <?php if($res['img3'] != ''){ ?> <img src="../images/<?php echo $res['img3']; ?>" class="img-fluid" /> <?php } ?>-->
                    <?php echo $res['hotel_name'];  ?>
                  </td>
                  <td scope="row"><?php echo $res['type'];  ?></td>
                  <td scope="row" align="center" class="align-moddle"><?php echo $res['star_rating'];  ?><img src="img/rating.png" class="img-fluid" style="max-width:15px;"></td>
                  <td scope="row"><?php echo $res['location'];  ?></td>
                  <td scope="row"><?php echo $res['address'];  ?></td>
                  <td scope="row"><?php echo $res['contact'];  ?><br /><?php echo $res['contact_person']; ?></td>
                  <td scope="row"><?php echo $res['zone'];  ?></td>
                  <td scope="row"><?php echo $res['amenities'];  ?></td>
                  <td scope="row"><?php echo $res['price_range'];  ?></td>
                  <td scope="row"><?php echo $res['distance_from_masjid'];  ?></td>
                  <td scope="row"><?php echo $res['lastedit'];  ?></td>
                    <td scope="row">
                        <a name="" id="" class="btn btn-primary btn-sm" href="./index.php?view=rooms&id=<?php echo $res['hotel_id'] ?>" role="button">Rooms</a>
                        <a name="" id="" class="btn btn-info btn-sm" href="./index.php?view=hotel&id=<?php echo $res['hotel_id'] ?>&type=edit" role="button">Edit</a>
                        <a name="" id="" class="btn btn-danger btn-sm" href="./deleteHotel.php?id=<?php echo $res['hotel_id'] ?>" role="button">Delete</a>
                    </td>
              </tr>
  <?php } ?>
          </tbody>

        <tfoot>
            <tr>
                <th>Hotel Name</th>
                <th>Type</th>
                <th>Star Rating</th>
                <th>Location</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Zone</th>
                <th>Price Range</th>
                <th>Amenities</th>
                <th>Distance From Masjid</th>
                <th>Last Edit</th>
                <th>Action</th>
            </tr>
        </tfoot>
      </table>
        </div>
    </div>