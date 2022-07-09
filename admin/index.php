<?php
include("../session.php");
include('../include/dbconn.php');
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: ../login');
}

?>

<?php
include('../include/navbarAdmin.php')
?>
<!-- partial -->
<div class="main">
  <h1> E-Sukan Equipment Booking System</h1>
  <h3>Welcome <?php echo $_SESSION['username']; ?></h3>
  <?PHP
  $q = "select * from booking where booking_type = 1";
  $r = mysqli_query($dbconn, $q) or die(mysqli_error($dbconn));
  $numrow = mysqli_num_rows($r);
  ?>
  <p>On The Go Booking Records</p>
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
    $row = mysqli_fetch_array($r);

    if ($color == 1) {
      echo "<tr bgcolor='#c8c9ce'>"
  ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['user_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipment_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_date'])); ?></td>
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
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_date'])); ?></td>
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
</div>
<!-- For second type of booking,durational-->
<p>Durational Booking Records</p>
<?php
$q1 = "select * from booking where booking_type = 2";
$r1 = mysqli_query($dbconn, $q1) or die("Error: " . mysqli_error($dbconn));
$numrow = mysqli_num_rows($r1);
?>
<tr align="left" bgcolor="#f2f2f2">
  <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border: radius 2px;">
      <tr align="left" bgcolor="#272c33" style="color:white ;">
        <th width="2%">No
  </td>
  <th width="5%">Booking ID</th>
  <th width="5%">User ID</th>
  <th width="5%">Equipment ID</th>
  <th width="5%">Date Borrow</th>
  <th width="5%">Expected Date Return</th>
  <th width="5%">Quantity</th>
  <th width="5%">Return</th>
</tr>
<?php
$color = "1";

for ($a = 0; $a < $numrow; $a++) {
  $row = mysqli_fetch_array($r1);

  if ($color == 1) {
    echo "<tr bgcolor='#c8c9ce'>"
?>
    <td>&nbsp;<?php echo $a + 1; ?></td>
    <td>&nbsp;<?php echo ucwords(strtolower($row['booking_id'])); ?></td>
    <td>&nbsp;<?php echo ucwords(strtolower($row['user_id'])); ?></td>
    <td>&nbsp;<?php echo ucwords(strtolower($row['equipment_id'])); ?></td>
    <td>&nbsp;<?php echo ucwords(strtolower($row['date_borrow'])); ?></td>
    <td>&nbsp;<?php echo ucwords(strtolower($row['date_return'])); ?></td>
    <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
    </td>
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
    <td>&nbsp;<?php echo ucwords(strtolower($row['date_borrow'])); ?></td>
    <td>&nbsp;<?php echo ucwords(strtolower($row['date_return'])); ?></td>
    <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
    </td>
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