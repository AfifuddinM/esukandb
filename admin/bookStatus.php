<?php
session_start();
include('../include/dbconn.php');
include("../session.php");
$adminname = $_SESSION['username'];
$q1 = "select user_id from user where username = '$adminname'";
$r1 = mysqli_query($dbconn, $q1) or die("Error: " . mysqli_error($dbconn));
$rr = mysqli_fetch_assoc($r1);
$adminid = $rr['user_id'];
if (isset($_POST['book'])) {
    $status = $_POST['status'];
    $bookingId = $_GET['id'];
    if ($status == 1) {
        echo "DITERIMA";
        $q = "UPDATE booking SET adminid = $adminid, status=1 WHERE booking_id = $bookingId";
        $res = mysqli_query($dbconn, $q) or die(mysqli_error($dbconn));
        if ($res) {
            echo "<script>
            alert('Booking application has been approved');
            window.location.href='managebooking.php';
            </script>";
        } else {
            echo "<script>
            alert('Booking Application Error!!');
            window.location.href='managebooking.php';
            </script>";
        }
        //status=1 accept 2=reject
    } else if ($status == 2) {
        echo "DITolak";
        $q = "UPDATE booking SET adminid = $adminid, status=2 WHERE booking_id = $bookingId";
        $res = mysqli_query($dbconn, $q) or die(mysqli_error($dbconn));
        if ($res) {
            echo "<script>
            alert('Booking application has been denied');
            window.location.href='managebooking.php';
            </script>";
        } else {
            echo "<script>
            alert('Booking Application Error!!');
            window.location.href='managebooking.php';
            </script>";
        }
    } else {
    }
}
