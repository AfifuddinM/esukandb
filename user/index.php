<?php
include("../session.php");
include('../include/dbconn.php');
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
  header('Location: ../login');
}

?>
<?php include('../include/navbarUser.php') ?>
<!-- partial -->
<div class="main">
  <h1> E-Sukan Equipment Booking System</h1>
  <h3>Welcome <?php echo $username; ?></h3>
  <?php
  $q1 = "select * from user where username = '$username'";
  $r1 = mysqli_query($dbconn, $q1) or die(mysqli_error($dbconn));
  $r0 = mysqli_fetch_assoc($r1);
  $userId = $r0['user_id'];

  $q2 = "select * from booking where user_id =$userId AND return_status !=1";
  $r2 = mysqli_query($dbconn, $q2) or die(mysqli_error($dbconn));
  $rr = mysqli_fetch_assoc($r2);
  if ($rr) {
    $status = $rr['status'];
    $equipmentId = $rr['equipment_id'];
    $quantity = $rr['quantity'];
    $borrowDate = $rr['date_borrow'];
    $returnDate = $rr['date_return'];
    $note = $rr['note'];
    $bookingType = $rr['booking_type'];
    $decline = $rr['decline_reason'];
    $q3 = "select * from equipment where equipmentid= $equipmentId";
    $r3 = mysqli_query($dbconn, $q3) or die("Error: " . mysqli_error($dbconn));
    $rs = mysqli_fetch_assoc($r3);
    $equipmentN = $rs['equipmentname'];
    echo '<div style="border:1px solid black ; ">';

    if ($status == 1) {
      if ($bookingType == 1) { //if he accepted booking is On The Go
        echo "<b>Booking ID:" . $rr['booking_id'] . "</b>";
        echo '<br>
         Equipment ID:<input type="text" value="' . $equipmentId . '" readonly>
        <br>
        Equipment Name:<input type="text" value="' . $equipmentN . '" readonly>
        <br>
        Quantity:<input type="number" value="' . $quantity . '" readonly>
        <br>
        Borrow Date:<input type="text" name="dateborrow" value=" ' . $rr['booking_date'] . '" readonly>
        <br>
        Purpose of Booking:<input type="text" maxlength="255" name="note" style="width:20% ; height:100px;" value="' . $note . '" readonly>';

        echo "<br><b>Your Booking Application Has Been Approved!!:</b>";
        echo '<form action="bookEquipment.php" method="post">
        <button type="submit" name= "retrieve">Claim Equipment</button>
        <button type="submit" name= "return">Return Equipment</button>
      </form>';
      } else { //if he accepted booking is durational
        echo "<b>Booking ID:" . $rr['booking_id'] . "</b>";
        echo '<br>
         Equipment ID:<input type="text" value="' . $equipmentId . '" readonly>
        <br>
        Equipment Name:<input type="text" value="' . $equipmentN . '" readonly>
        <br>
        Quantity:<input type="number" value="' . $quantity . '" readonly>
        <br>
        Borrow Date:<input type="text" name="dateborrow" value=" ' . $borrowDate . '" readonly>
        <br>
        Borrow Date:<input type="text" name="dateborrow" value=" ' . $returnDate . '" readonly>
        <br>
        Purpose of Booking:<input type="text" maxlength="255" name="note" style="width:20% ; height:100px;" value="' . $note . '" readonly>';

        echo "<br><b>Your Booking Application Has Been Approved!!:</b>";
        echo '<form action="bookEquipment.php" method="post">
        <button type="submit" name= "retrieve">Claim Equipment</button>
        <button type="submit" name= "return">Return Equipment</button>
      </form>';
      }
    } else if ($status == 2) {
      echo "<b>Booking ID:" . $rr['booking_id'] . "</b>";
      echo '<br>
       Equipment ID:<input type="text" value="' . $equipmentId . '" readonly>
      <br>
      Equipment Name:<input type="text" value="' . $equipmentN . '" readonly>
      <br>
      Quantity:<input type="number" value="' . $quantity . '" readonly>
      <br>
      Borrow Date:<input type="text" name="dateborrow" value=" ' . $borrowDate . '" readonly>
      <br>
      Return Date:<input type="text" name="dateborrow" value=" ' . $returnDate . '" readonly>
      <br>
      Purpose of Booking:<input type="text" maxlength="255" name="note" style="width:20% ; height:100px;" value="' . $note . '" readonly>
      ';

      echo "<br><b>Unfotunately your booking has been rejected! Because:</b>" . "<b>" . $decline . "</b>";
      echo ' <br> <b>If you wish to make another booking click the button below!</b>';
      echo '<form action="bookEquipment.php" method="post">
      <button type="submit">Book an Equipment</button>
    </form>';
    } else {
      echo "Your booking is still pending";
      if ($bookingType == 1) { //if he pending booking is On The Go
        echo "<b>Booking ID:" . $rr['booking_id'] . "</b>";
        echo '<br>
         Equipment ID:<input type="text" value="' . $equipmentId . '" readonly>
        <br>
        Equipment Name:<input type="text" value="' . $equipmentN . '" readonly>
        <br>
        Quantity:<input type="number" value="' . $quantity . '" readonly>
        <br>
        Borrow Date:<input type="text" name="dateborrow" value=" ' . $rr['booking_date'] . '" readonly>
        <br>
        Purpose of Booking:<input type="text" maxlength="255" name="note" style="width:20% ; height:100px;" value="' . $note . '" readonly>';

        echo "<br><b>Your Booking Application Is Still Waiting Please Wait YA!:</b>";
      } else { //if he pending booking is durational
        echo "<b>Booking ID:" . $rr['booking_id'] . "</b>";
        echo '<br>
         Equipment ID:<input type="text" value="' . $equipmentId . '" readonly>
        <br>
        Equipment Name:<input type="text" value="' . $equipmentN . '" readonly>
        <br>
        Quantity:<input type="number" value="' . $quantity . '" readonly>
        <br>
        Borrow Date:<input type="text" name="dateborrow" value=" ' . $borrowDate . '" readonly>
        <br>
        Borrow Date:<input type="text" name="dateborrow" value=" ' . $returnDate . '" readonly>
        <br>
        Purpose of Booking:<input type="text" maxlength="255" name="note" style="width:20% ; height:100px;" value="' . $note . '" readonly>';

        echo "<br><b>Your Booking Application Is Still Waiting Please Wait YA!:</b>";
      }
    }
  }
  ?>
</div>


</div>
</body>
</div>


</html>