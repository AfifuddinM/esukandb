<?php
include("../include/dbconn.php");
include("../session.php");
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: ../login');
}

include("../include/newnavbarUser.php");
?>

<head>
  <title>Search Equipment</title>
</head>

<body>
  <br>
  <?php
  $query = "SELECT * FROM equipment  WHERE equipmentstock > '1' ORDER BY equipmentid";
  $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
  $numrow = mysqli_num_rows($result);
  ?>
  <tr align="left" bgcolor="#f2f2f2">
    <td>
      <div style="margin-left:5%; margin-right:5%;">
        <h4>Book Equipment</h4>
        <br>
        <table class="table table-striped table-hover">
          <thead class="table-light" style="width:100% ;">
            <th width="4%">No
    </td>
    <th width="10%">Equipment ID</th>
    <th width="10%">Equipment Name</th>
    <th width="8%">Equipment Stock</th>
    <th width="25%">Equipment Desc</th>
    <th width="9%" align="center" style="text-align:center;">Action</th>
    </thead>

  </tr>

  <?php
  $color = "1";

  for ($a = 0; $a < $numrow; $a++) {
    $row = mysqli_fetch_array($result);

    if ($color == 1) {
      echo "<tr bgcolor='#c8c9ce'>"
  ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipmentid'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipmentname'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipmentstock'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipmentdesc'])); ?></td>
      </td>
      <td colspan="1" width="5%" align="center">
        <form style="display:flex ;" action="booking.php?id=<?php echo $row['equipmentid']; ?>" method="post">
          <select class="form-control" name="bookType" style="margin-right:5px;">
            <option value=1>On The Go </option>
            <option value=2>Durational</option>
          </select>
          <button class="btn btn-primary" type="submit" name="book" <?php echo $row['equipmentid']; ?>>submit</button>
        </form>
      </td>
      </tr>
    <?php
      $color = "2";
    } else {
      echo "<tr bgcolor='#FFFFFF'>"
    ?>
      <td>&nbsp;<?php echo $a + 1; ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipmentid'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipmentname'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipmentstock'])); ?></td>
      <td>&nbsp;<?php echo ucwords(strtolower($row['equipmentdesc'])); ?></td>
      </td>

      <td colspan="1" width="5%" align="center">
        <form style="display:flex ;" action="booking.php?id=<?php echo $row['equipmentid']; ?>" method="post">
          <select class="form-control" name="bookType" style="margin-right:5px;">
            <option value=1>On The Go </option>
            <option value=2>Durational</option>
          </select>
          <button class="btn btn-primary" type="submit" name="book" <?php echo $row['equipmentid']; ?>>submit</button>
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
  </div>

  </div>
  </div>
</body>

</html>