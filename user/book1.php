<?php
session_start();
include('../include/dbconn.php');
include("../session.php");
if (isset($_POST['bookSubmit'])) {
  $userid = $_POST['userid'];
  $dependentid = $_POST['dependentid'];
  $note = $_POST['note'];
  $dateborrow = $_POST['dateborrow'];
  $equipmentid = $_POST['equipmentid'];
  $qty = $_POST['qty'];
  $q3 = "insert into booking (user_id,dependant_id,equipment_id,quantity,note,booking_date,status,booking_type)
  values('$userid','$dependentid','$equipmentid','$qty','$note','$dateborrow','3','1')";
  $r3 = mysqli_query($dbconn, $q3);
  if ($r3) {
    echo "<script>
    alert('Booking has been added');
    window.location.href='index.php';
    </script>";
  }
}
