<?php
include("../include/dbconn.php");
include("../session.php");
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login');
}
$adminname = $_SESSION['username'];
$bookingId = $_GET['id'];
include("../include/navbarAdmin.php");
?>

<head>
    <title>Manage Booking</title>
</head>

<div>
    <h1>Booking Applicant Info</h1>
    <?php
    $q1 = "select * from booking where booking_id= $bookingId";
    $r1 = mysqli_query($dbconn, $q1) or die("Error: " . mysqli_error($dbconn));
    $r = mysqli_fetch_assoc($r1);
    $userid = $r['user_id'];
    $equipmentid = $r['equipment_id'];
    //variables for accessing booking 
    $q2 = "select * from equipment where equipmentid=$equipmentid";
    $res = mysqli_query($dbconn, $q2) or die(mysqli_error($dbconn));
    $r2 = mysqli_fetch_assoc($res);
    //variables for accessing equipment
    $q3 = "select * from user where user_id= $userid";
    $result = mysqli_query($dbconn, $q3) or die("Error: " . mysqli_error($dbconn));
    $r3 = mysqli_fetch_assoc($result);
    //variables for accessing user
    $dependantid = $r['dependant_id'];
    $q4 = "select * from user where user_id = $dependantid";
    $result4 = mysqli_query($dbconn, $q4) or die("Error: " . mysqli_error($dbconn));
    $r4 = mysqli_fetch_assoc($result4);
    $dependantName = $r4['username'];

    $q5 = "select user_id from user where username = '$adminname'";
    $r5 = mysqli_query($dbconn, $q5) or die("Error: " . mysqli_error($dbconn));
    $rr5 = mysqli_fetch_assoc($r5);
    $adminid = $rr5['user_id'];

    ?>
    <form action="bookStatus.php?id=<?php echo $bookingId; ?>" method="post">
        <div style="display:flex ; flex-direction:column; float:left; margin-right:20px;">
            User ID:<input type="text" value="<?php echo $r['user_id']; ?>" name="userid" readonly>
            Username:<input type="text" value="<?php echo $r3['username']; ?>" readonly>
            Telephone Number:<input type="text" value="<?php echo $r3['telephone']; ?>" readonly>
            Email:<input type="text" value="<?php echo $r3['email']; ?>" readonly>
            Address:<input type="text" value="<?php echo $r3['address']; ?>" readonly>
        </div>
        <div class="dependent" style="display:flex ; flex-direction:column; width:30% ;margin-left:100px;">
            <p><b>Please insert A Dependent(Witness)</b></p>
            dependentId:<input type="text" name="dependentid" value="<?PHP echo $dependantid; ?>" readonly>
            dependentUsername:<input type="text" name="dependentusername" value="<?PHP echo $dependantName ?>">
        </div>
        <br><br><br><br><br><br>
        <hr>
        <h1>Booking Equipment Info</h1>
        <div>
            Equipment ID:<input type="text" value="<?php echo $r2['equipmentid']; ?>" name="equipmentid" readonly>
            Equipment Name:<input type="text" value="<?php echo $r2['equipmentname']; ?>" readonly>
            Quantity:<input type="number" value="<?PHP echo $r['quantity']; ?>" name="qty" readonly>
            <br>
            Borrow Date:<input type="text" name="dateborrow" value="<?PHP echo $r['date_borrow']; ?>" readonly>
            <br>
            Return Date:<input type="text" name="datereturn" value="<?PHP echo $r['date_return']; ?>" readonly>
            <br>
            Purpose of Booking<input type="text" maxlength="255" name="note" style="width:20% ; height:100px;" value="<?PHP echo $r['note']; ?>" readonly>
            <br>
            <br><br>
            <select name="status" style="margin-right:5px; padding-right:50px;">
                <option value=1>Accept </option>
                <option value=2>Decline</option>
            </select>
            <button type="submit" name="book" <?php echo $bookingId; ?>>Verify</button>
    </form>
    </td>
    </tr>
</div>