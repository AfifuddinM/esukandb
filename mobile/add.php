<?php
include('../include/dbconn.php');
$name = $_POST['name']; //the @ is optional, to suppress error messages
$stock = $_POST['stock'];
$desc = $_POST['desc'];

/*$name="data"; //the @ is optional, to suppress error messages
$des="data";
$status=1;
$cat=1;
$size=1;
$price=1;*/

$sql = "insert into equipment (equipmentname,equipmentstock,equipmentdesc) values('$name',$stock,'$desc')";
$res = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
if ($res == 1) echo "OK";
mysqli_close($dbconn);
