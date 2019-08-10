<?php

$hotel_id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';


// CHECK FOR THE RECORD FROM TABLE
$query = "select * from rooms where hotel_id = $hotel_id";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

?>

    <div class="row">
      <div class="col-6">
      <h3>Room Listing<br /><small>Update availibility by changing the counts for each room</small></h3>
      <div class="accom_form">
      <table class="table table-striped table-hover">
          <thead class="thead-dark">
              <tr>
                  <th>Name</th>
                  <th>Count</th>
                  <th>Update</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
          <!-- $arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
} -->
<?php
  while($res = mysqli_fetch_array($result)) {
      ?>
      <form method="get" action="./room-model.php?action=updateRoom">
              <tr>
                  <td scope="row">
                    <?php echo $res['room_name'];  ?><br /><small><?php echo $res['room_description'];  ?></small>
                  </td>
                  <td scope="row">
                    <div class="form-group room_count">
                      <input type="number" class="form-control" name="count" data-roomid="<?php echo $res['room_id']; ?>" class="avail_count_<?php echo $res['room_id']; ?>" value="<?php echo $res['available_count'];  ?>">
                      <input type="hidden" name="hotelId" value="<?php echo $res['hotel_id']; ?>">
                      <input type="hidden" name="roomId" value="<?php echo $res['room_id']; ?>">
                      <input type="hidden" name="action" value="updateRoom">
                    </div>
                  </td>
                  <td><input type="submit" value="Update" class="btn btn-success btn-sm" />
                  <td><a href="room-model.php?action=delete&id=<?php echo $res['room_id']; ?>" class="btn btn-warning btn-sm">X</a>
              </tr>
  <?php } ?>
</form>
          </tbody>
      </table>
      <!-- <a href="<?php //echo $server_link; ?>" class="btn btn-success">Update</a> -->
      </div>
      </div>
      <div class="col-6">
        <h3>Add Room</h3>
        <form method="post" class="form accom_form" action="./room-model.php?hotelId=<?php echo $hotel_id; ?>&action=add">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="roomName" id="roomName" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <div class="form-group">
              <label for=""></label>
              <textarea class="form-control" name="roomDescription" id="roomDescription" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="">Count</label>
            <input type="number" name="roomCount" id="roomCount" class="form-control">
          </div>
          <input type="submit" value="Add" class="btn btn-success" />
        </form>
      </div>
    </div>
