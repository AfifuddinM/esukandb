<?php
include("../include/dbconn.php");
include("../session.php");
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login');
}

include("../include/navbarAdmin.php");
?>

<head>
    <title>Manage Booking</title>
</head>

<div>
    <?php
    $q1 = "select * from booking where booking_type = 2 and status = 3 and return_status=0";
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
        <th width="5%">Date Return</th>
        <th width="5%">Quantity</th>
        <th width="5%" align="center" style="text-align:center;" colspan="2">Action</th>
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
            <td width="7%" align="center"><a class="one" href="verifyBooking.php?id=<?php echo $row['booking_id']; ?>">Detail</a></td>
            <td width="3%" align="center"><a class="one" href="deleteBooking.php?id=<?php echo $row['booking_id']; ?>" style="color:red ;">Delete</a></td>
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
            <td width="7%" align="center"><a class="one" href="verifyBooking.php?id=<?php echo $row['booking_id']; ?>">Detail</a></td>
            <td width="3%" align="center"><a class="one" href="deleteBooking.php?id=<?php echo $row['booking_id']; ?>" style="color:red ;">Delete</a></td>
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