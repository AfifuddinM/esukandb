<?php
include('../include/dbconn.php');
include("../session.php");
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login');
}
if (isset($_POST['updatebtn'])) {
    $equipmentStock = $_POST['stock'];
    $equipmentDesc = $_POST['desc'];
    $equipmentId = $_POST['equipmentid'];
    $q1 = "UPDATE equipment SET equipmentstock = $equipmentStock, equipmentdesc = '$equipmentDesc' where equipmentid = $equipmentId";
    $r1 = mysqli_query($dbconn, $q1) or die(mysqli_error($dbconn));
    if ($r1) {
        echo "
<script>
    alert('Equipment data has been updated');
    window.location.href = 'viewEquipment.php';
</script>";
    } else
        echo "
<script>
    alert('Equipment data failed to be deleted');
    window.location.href = 'viewEquipment.php';
</script>";
}
echo "rerror";
mysqli_close($dbconn);
