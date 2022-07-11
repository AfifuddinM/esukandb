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
  <?PHP
  $q1 = "select * from user where username = '$username'";
  $r1 = mysqli_query($dbconn, $q1) or die(mysqli_error($dbconn));
  $rr = mysqli_fetch_assoc($r1);
  $userId = $rr['user_id'];
  $q2 = "select * from booking where user_id =$userId AND return_status = 0";
  $r2 = mysqli_query($dbconn, $q2) or die(mysqli_error($dbconn));
  $numrow = mysqli_num_rows($r2);
  ?>
  <p>Item To Return</p>
  <tr align="left" bgcolor="#f2f2f2">
    <td>
      <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border: radius 2px;">
        <tr align="left" bgcolor="#272c33" style="color:white ;">
          <th width="2%">No
    </td>
    <th width="5%">Booking ID</th>
    <th width="5%">User ID</th>
    <th width="5%">Equipment ID</th>
    <th width="5%">Booking Date</th>
    <th width="5%">Quantity</th>
    <th width="5%">Return</th>
  </tr>
  <?php
  $color = "1";

  for ($a = 0; $a < $numrow; $a++) {
    $row = mysqli_fetch_array($r2);

    if ($color == 1) {
      echo "<tr bgcolor='#c8c9ce'>"
  ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['user_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipment_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_date'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
      <td>
        <form action="returnEquipment.php" method="POST" style="margin: 0%; ">
          <button type="submit" style="height:100%; width:100%;">Return Equipment</button>
        </form>
      </td>
      </tr>

  <?php
      $color = "1";
    }
  }
  if ($numrow == 0) {
    echo '<tr>
    				<td colspan="8"><font color="#FF0000">No record available.</font></td>
 			   </tr>';
  }
  ?>
  </table>
  </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  </table>
  <?PHP
  $q3 = "select * from booking where user_id = $userId";
  $r3 = mysqli_query($dbconn, $q3) or die(mysqli_error($dbconn));
  $numrow1 = mysqli_num_rows($r3);
  ?>
  <p>Booking Records</p>
  <tr align="left" bgcolor="#f2f2f2">
    <td>
      <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border: radius 2px;">
        <tr align="left" bgcolor="#272c33" style="color:white ;">
          <th width="2%">No
    </td>
    <th width="5%">Booking ID</th>
    <th width="5%">User ID</th>
    <th width="5%">Equipment ID</th>
    <th width="5%">Quantity</th>
    <th width="5%">Return</th>
  </tr>
  <?php
  $color = "1";

  for ($a = 0; $a < $numrow1; $a++) {
    $row = mysqli_fetch_array($r3);

    if ($color == 1) {
      echo "<tr bgcolor='#c8c9ce'>"
  ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['user_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipment_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
      <td>&nbsp;
        <?PHP
        if ($row['return_status'] == 1) {
          echo "returned";
        } else {
          echo "pending";
        }
        ?>
      </td>
      </tr>
    <?php
      $color = "2";
    } else {
      echo "<tr bgcolor='#FFFFFF'>"
    ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['user_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipment_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
      <td>&nbsp;
        <?PHP
        if ($row['return_status'] == 1) {
          echo "returned";
        } else {
          echo "pending";
        }
        ?>
      </td>
      </tr>
  <?php
      $color = "1";
    }
  }
  if ($numrow == 0) {
    echo '<tr>
    				<td colspan="8"><font color="#FF0000">No record available.</font></td>
 			   </tr>';
  }
  ?>
  </table>
  </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  </table>
  </body>

  </html>