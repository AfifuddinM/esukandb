<?php
include('../include/dbconn.php');
$searchname = $_GET['search'];
$sql = "select * from equipment where equipmentname like '%$searchname%' ";
$res = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
while ($r = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    $json[] = $r;
}
echo json_encode($json, JSON_UNESCAPED_UNICODE);
mysqli_free_result($res);
mysqli_close($dbconn);
