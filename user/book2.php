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
  $q2 = "select count(return_status) as total from booking where user_id = $userid and return_status = 0";
  //only allowing users to make another booking if they have return a previous booking
  $r2 = mysqli_query($dbconn, $q2);
  $data = mysqli_fetch_assoc($r2);
  $count =  $data['total'];
  if ($count < 1) {
    $q3 = "insert into booking (user_id,dependant_id,equipment_id,quantity,note,date_borrow,date_return,status,booking_type,return_status,user_retrieve)
  values('$userid','$dependentid','$equipmentid','$qty','$note','$dateborrow','$datereturn','3','2','0','0')";
    $r3 = mysqli_query($dbconn, $q3);
    if ($r3) {
      echo "<script>
    alert('Booking has been added,please wait for it to be verified.');
    window.location.href='index.php';
    </script>";
    }
  } else {
    echo "<script>
  alert('user can only make one booking at a time');
  window.location.href='index.php';
  </script>";
  }
}
