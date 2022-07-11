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
  $q2 = "select count(return_status) as total from booking where user_id = $userid and return_status = 0";
  //only allowing users to make another booking if they have return a previous booking
  $r2 = mysqli_query($dbconn, $q2);
  $data = mysqli_fetch_assoc($r2);
  $count =  $data['total'];
  if ($count < 1) {
    //making sure that user can only make one booking
    $q3 = "insert into booking (user_id,dependant_id,equipment_id,quantity,note,booking_date,status,booking_type,return_status,user_retrieve)
  values('$userid','$dependentid','$equipmentid','$qty','$note','$dateborrow','1','1','0','0')";
    //status = auto confirm, 1=accepted, 2=declined, 3=pending
    $r3 = mysqli_query($dbconn, $q3);
    if ($r3) {
      echo "<script>
        alert('Booking has been verified and processed, please go to the Unit Sukan to claim your item');
        window.location.href='index.php';
        </script>";
    } else {
      echo "<script>
      alert('user can only make one booking at a time');
      window.location.href='index.php';
      </script>";
    }
  }
  /*
    if ($r3) {
      $q4 = "update equipment set equipmentstock = equipmentstock - 1 where equipmentid = $equipmentid";
      $r4 = mysqli_query($dbconn, $q4);
      if ($r4) {
        echo "<script>
        alert('Booking has been verified and processed, please go to the Unit Sukan to claim your item');
        window.location.href='index.php';
        </script>";
      }
    }
  } else {
    echo "<script>
    alert('user can only make one booking at a time');
    window.location.href='index.php';
    </script>";
  }
}
*/
}
