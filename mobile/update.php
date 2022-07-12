<?php
include('../include/dbconn.php');
//$pid=1;
$pid = $_POST['pid'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$stock = $_POST['stock'];

//sql="update product set product_name='name', product_description='description', product_status='status', product_category='category', product_size='size', product_price='price' where product_id='$pid'";

$sql = "update equipment set equipmentname='$name',equipmentstock=$stock,equipmentdesc='$desc' where equipmentid=$pid";
$res = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
if ($res === true) echo "OK_EDIT";
mysqli_close($dbconn);
