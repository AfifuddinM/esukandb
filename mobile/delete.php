<?php
include('../include/dbconn.php');
$pid = @$_POST['pid'];
$sql = "delete from equipment where equipmentid=$pid";
$res = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
if ($res == 1) echo "OK_DEL";
mysqli_close($dbconn);
