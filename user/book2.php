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
  $datereturn = $_POST['datereturn'];
  $q3 = "insert into booking (user_id,dependant_id,equipment_id,quantity,note,date_borrow,date_return,status,booking_type,return_status)
  values('$userid','$dependentid','$equipmentid','$qty','$note','$dateborrow','$datereturn','3','2','0')";
  $r3 = mysqli_query($dbconn, $q3);
  if ($r3) {
    echo "<script>
    alert('Booking has been added');
    window.location.href='index.php';
    </script>";
  }
}
