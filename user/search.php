<?php
include('../include/dbconn.php');
include("../session.php");

if (isset($_POST['search'])) {
  $searchname = $_POST['searchname'];
} else
  header("location:index.php");
?>
<style>
  #tableSearch {
    margin: 0;
    padding: 0;
    border-radius: 2px;

  }

  .main {
    top: 20%;
  }

  .container {
    top: 20%;
  }
</style>
<?php
include('./searchEquipment.php');
?>
<?php
$query = "select * from equipment where equipmentname like '%$searchname%' ";
$result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
$numrow = mysqli_num_rows($result);
?>
<div class="main">

  <div class="container">
    <br>
    <br>
    <br><br><br><br><br>
    <td>
      <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" id="tableSearch">
        <tr align="left" bgcolor="#272c33" style="color:white ;">
          <th width="4%">No
    </td>
    <th width="17%">Equipment ID</th>
    <th width="23%">Equipment Name</th>
    <th width="9%">Equipment Stock</th>
    <th width="25%">Equipment Desc</th>
    <th width="5%">Book</th>
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
          <form action="booking.php?id=<?php echo $row['equipmentid']; ?>" method="post">
            <select name="bookType" style="margin-right:5px;">
              <option value=1>On The Go </option>
              <option value=2>Durational</option>
            </select>
            <button type="submit" name="book" <?php echo $row['equipmentid']; ?>>submit</button>
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
          <form action="booking.php?id=<?php echo $row['equipmentid']; ?>" method="post">
            <select name="bookType" style="margin-right:5px;">
              <option value=1>On The Go </option>
              <option value=2>Durational</option>
            </select>
            <button type="submit" name="book" <?php echo $row['equipmentid']; ?>>submit</button>
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
</body>

</html>