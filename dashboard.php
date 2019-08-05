<?php
if(session_status() == 0) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/accomdation2");
}
require('config.php');

// CHECK FOR THE RECORD FROM TABLE
$query = "select * from hotel";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" crossorigin="anonymous">
    
  </head>
  <body>
  <?php require('nav.php'); ?>
      <div class="container">
    <a name="" id="" class="btn btn-success" href="./hotel.php?type=add" role="button">Add</a>
    <a name="" id="" class="btn btn-primary" href="./logout.php" role="button">Logout</a>
      <table id="hotels" class="table">
          <thead>
              <tr>
                  <th>Hotel ID</th>
                  <th>Hotel Name</th>
                  <th>Star Rating</th>
                  <th>Location</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Contact Person</th>
                  <th>Zone</th>
                  <th>Price Range</th>
                  <th>Amenities</th>
                  <th>Last Edit</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
<?php
  while($res = mysqli_fetch_array($result)) {
      ?>
              <tr>
                  <td scope="row"><?php echo $res['hotel_id'];  ?></td>
                  <td scope="row"><?php echo $res['hotel_name'];  ?></td>
                  <td scope="row"><?php echo $res['star_rating'];  ?></td>
                  <td scope="row"><?php echo $res['location'];  ?></td>
                  <td scope="row"><?php echo $res['address'];  ?></td>
                  <td scope="row"><?php echo $res['contact'];  ?></td>
                  <td scope="row"><?php echo $res['contact_person'];  ?></td>
                  <td scope="row"><?php echo $res['zone'];  ?></td>
                  <td scope="row"><?php echo $res['price_range'];  ?></td>
                  <td scope="row"><?php echo $res['amenities'];  ?></td>
                  <td scope="row"><?php echo $res['lastedit'];  ?></td>
                  <td scope="row"><a name="" id="" class="btn btn-info" href="./hotel.php?id=<?php echo $res['hotel_id'] ?>&type=edit" role="button">Edit</a></td>
                  <td scope="row"><a name="" id="" class="btn btn-danger" href="./deleteHotel.php?id=<?php echo $res['hotel_id'] ?>" role="button">Delete</a></td>
              </tr>
  <?php } ?>
          </tbody>
          
        <tfoot>
            <tr>
                <th>Hotel ID</th>
                <th>Hotel Name</th>
                <th>Star Rating</th>
                <th>Location</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Contact Person</th>
                <th>Zone</th>
                <th>Price Range</th>
                <th>Amenities</th>
                <th>Last Edit</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
      </table>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
      $(document).ready(function() {
          $('#hotels').DataTable();
      } );
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  </body>
</html>