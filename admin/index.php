<?php
include("../session.php");
include('../include/dbconn.php');
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: ../login');
}

?>

<?php
include('../include/newnavbar.php')
?>
<!-- partial -->
<div class="main" style="margin-left: 5%; margin-right:5%">
  <br>
  <h3 class="display-4">Welcome <?php echo $_SESSION['username']; ?></h3>
  <?PHP
  $q = "select * from booking where booking_type = 1 and status != 2";
  $r = mysqli_query($dbconn, $q) or die(mysqli_error($dbconn));
  $numrow = mysqli_num_rows($r);
  ?>
  <p>On The Go Booking Records</p>
  <td>
    <table class="table table-striped table-hover">
  </td>
  <thead class="table-light" style="width:100% ;">
    <th width="2%">No
    <th width="5%">Booking ID</th>
    <th width="5%">User ID</th>
    <th width="5%">Equipment ID</th>
    <th width="5%">Booking Date</th>
    <th width="5%">Quantity</th>
    <th width="5%">Status</th>
    <th width="5%">Return</th>
  </thead>
  <?php
  $color = "1";

  for ($a = 0; $a < $numrow; $a++) {
    $row = mysqli_fetch_array($r);

    if ($color == 1) {
      //echo "<tr bgcolor='#c8c9ce'>"
  ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['user_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipment_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_date'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
      <td><?PHP
          if ($row['status'] == 1) {
            echo "accepted";
          } else {
            echo "declined";
          }
          ?></td>
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
      //echo "<tr bgcolor='#FFFFFF'>"
    ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['user_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipment_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_date'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
      <td>
        <?PHP
        if ($row['status'] == 1) {
          echo "accepted";
        } else {
          echo "declined";
        }
        ?>
      </td>
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

  <!-- For second type of booking,durational-->
  <p>Durational Booking Records</p>
  <?php
  $q1 = "select * from booking where booking_type = 2 and status != 2";
  $r1 = mysqli_query($dbconn, $q1) or die("Error: " . mysqli_error($dbconn));
  $numrow = mysqli_num_rows($r1);
  ?>
  <td>
    <table class="table table-striped table-hover">
  </td>
  <thead class="table-light" style="width:100% ;">
    <th width="2%">No
    <th width="5%">Booking ID</th>
    <th width="5%">User ID</th>
    <th width="5%">Equipment ID</th>
    <th width="5%">Date Borrow</th>
    <th width="5%">Expected Date Return</th>
    <th width="5%">Quantity</th>
    <th width="5%">Status</th>
    <th width="5%">Return</th>
  </thead>
  <?php
  $color = "1";

  for ($a = 0; $a < $numrow; $a++) {
    $row = mysqli_fetch_array($r1);

    if ($color == 1) {
      //echo "<tr bgcolor='#c8c9ce'>"
  ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['user_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipment_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['date_borrow'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['date_return'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
      <td>
        <?PHP
        if ($row['status'] == 1) {
          echo "accepted";
        } else if ($row['status'] == 3) {
          echo "pending";
        } else {
          echo "declined";
        }
        ?>
      </td>
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
      //echo "<tr bgcolor='#FFFFFF'>"
    ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['booking_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['user_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipment_id'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['date_borrow'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['date_return'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
      <td>
        <?PHP
        if ($row['status'] == 1) {
          echo "accepted";
        } else if ($row['status'] == 3) {
          echo "pending";
        } else {
          echo "declined";
        }
        ?>
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
  <p>Rejected Booking Records</p>
  <?php
  $q2 = "select * from booking where status = 2";
  $r2 = mysqli_query($dbconn, $q2) or die("Error: " . mysqli_error($dbconn));
  $numrow = mysqli_num_rows($r2);
  ?>
  <tr align="left" bgcolor="#f2f2f2">
    <td>
    <td>
      <table class="table table-striped table-hover">
    </td>
    <thead class="table-light" style="width:100% ;">
      <th width="2%">No
        </td>
      <th width="5%">Booking ID</th>
      <th width="5%">User ID</th>
      <th width="5%">Equipment ID</th>
      <th width="5%">Date Borrow</th>
      <th width="5%">Expected Date Return</th>
      <th width="5%">Quantity</th>
      <th width="5%">Status</th>
    </thead>
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
      <td>&nbsp;<?php echo ucwords(strtolower($row['date_borrow'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['date_return'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['quantity'])); ?></td>
      </td>
      <td>&nbsp;
        <?PHP
        if ($row['status'] == 1) {
          echo "accepted";
        } else {
          echo "declined";
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
        if ($row['status'] == 1) {
          echo "accepted";
        } else {
          echo "declined";
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
    				<td colspan="10"><font color="#FF0000">No record available.</font></td>
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
<?php include('../include/script.php') ?>