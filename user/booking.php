<?php
include("../include/dbconn.php");
include("../session.php");
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
  header('Location: ../login');
}

include("../include/navbarUser.php");
?>

<head>
  <title>Search Equipment</title>
</head>
<h1>Personal Info</h1>
<?php
if (isset($_POST['book'])) {
  $booktype = $_POST['bookType'];
  if ($booktype == 1) {
    $equipmentId = $_GET['id'];
    $q = "select * from equipment where equipmentid=$equipmentId";
    $res = mysqli_query($dbconn, $q) or die(mysqli_error($dbconn));
    $r = mysqli_fetch_assoc($res);
?>

    <?php
    $q2 = "select * from user where username= '$username'";
    $result = mysqli_query($dbconn, $q2) or die("Error: " . mysqli_error($dbconn));
    $rr = mysqli_fetch_assoc($result);
    ?>
    <form action="book1.php" method="post">
      <div style="display:flex ; flex-direction:column; float:left; margin-right:20px;">
        User ID:<input type="text" value="<?php echo $rr['user_id']; ?>" placeholder="<?php echo $rr['user_id']; ?>" name="userid" readonly>
        Username:<input type="text" value="<?php echo $username ?>" placeholder="<?php echo $username ?>" readonly>
        Telephone Number:<input type="text" value="<?php echo $rr['telephone']; ?>" placeholder="<?php echo $rr['telephone']; ?>" readonly>
        Email:<input type="text" value="<?php echo $rr['email']; ?>" placeholder="<?php echo $rr['email']; ?>" readonly>
        Address:<input type="text" value="<?php echo $rr['address']; ?>" placeholder="<?php echo $rr['address']; ?>" readonly>
      </div>
      <div class="dependent" style="display:flex ; flex-direction:column; width:30% ;margin-left:100px;">
        <p><b>Please insert A Dependent(Witness)</b></p>
        dependentId:<input type="text" name="dependentid" required>
        dependentUsername:<input type="text" name="dependentusername" required>
      </div>
      <br><br><br><br><br><br>
      <hr>
      <h1>Booking Equipment Info</h1>
      <div>
        Equipment ID:<input type="text" value="<?php echo $r['equipmentid']; ?>" placeholder="<?php echo $r['equipmentid']; ?>" name="equipmentid" readonly>
        Equipment Name:<input type="text" value="<?php echo $r['equipmentname']; ?>" placeholder="<?php echo $r['equipmentname']; ?>" readonly>
        Quantity(Maximum 1 For This Type Of Booking):<input type="number" value=1 name="qty" placeholder=1 readonly>
        <input type="datetime-local" name="dateborrow" placeholder="When Will you like to book">
        <br>
        Purpose of Booking<input type="text" maxlength="255" name="note" style="width:20% ; height:100px;">
        <br>
        <button type="submit" name="bookSubmit">Submit</button>
      </div>
    </form>

  <?php

  } else if ($booktype == 2) {
    $equipmentId = $_GET['id'];
    $q = "select * from equipment where equipmentid=$equipmentId";
    $res = mysqli_query($dbconn, $q) or die(mysqli_error($dbconn));
    $r = mysqli_fetch_assoc($res);
  ?>

    <?php
    $q2 = "select * from user where username= '$username'";
    $result = mysqli_query($dbconn, $q2) or die("Error: " . mysqli_error($dbconn));
    $rr = mysqli_fetch_assoc($result);
    ?>
    <form action="book2.php" method="post">
      <div style="display:flex ; flex-direction:column; float:left; margin-right:20px;">
        User ID:<input type="text" value="<?php echo $rr['user_id']; ?>" placeholder="<?php echo $rr['user_id']; ?>" name="userid" readonly>
        Username:<input type="text" value="<?php echo $username ?>" placeholder="<?php echo $username ?>" readonly>
        Telephone Number:<input type="text" value="<?php echo $rr['telephone']; ?>" placeholder="<?php echo $rr['telephone']; ?>" readonly>
        Email:<input type="text" value="<?php echo $rr['email']; ?>" placeholder="<?php echo $rr['email']; ?>" readonly>
        Address:<input type="text" value="<?php echo $rr['address']; ?>" placeholder="<?php echo $rr['address']; ?>" readonly>
      </div>
      <div class="dependent" style="display:flex ; flex-direction:column; width:30% ;margin-left:100px;">
        <p><b>Please insert A Dependent(Witness)</b></p>
        dependentId:<input type="text" name="dependentid" required>
        dependentUsername:<input type="text" name="dependentusername" required>
      </div>
      <br><br><br><br><br><br>
      <hr>
      <h1>Booking Equipment Info</h1>
      <div>
        Equipment ID:<input type="text" value="<?php echo $r['equipmentid']; ?>" placeholder="<?php echo $r['equipmentid']; ?>" name="equipmentid" readonly>
        Equipment Name:<input type="text" value="<?php echo $r['equipmentname']; ?>" placeholder="<?php echo $r['equipmentname']; ?>" readonly>
        Quantity:<input type="number" min="0" max="<?PHP echo $r['equipmentstock']; ?>" name="qty" required>
        Borrow Date:<input type="datetime-local" name="dateborrow">
        Return Date:<input type="datetime-local" name="datereturn">
        <br>
        Purpose of Booking<input type="text" maxlength="255" name="note" style="width:20% ; height:100px;">
        <br>
        <button type="submit" name="bookSubmit">Submit</button>
      </div>
    </form>

<?php
  }
}
?>