<?php
include('../include/dbconn.php');
include("../session.php");
session_start();
//navbar
include('../include/newnavbar.php');
$id = $_GET['id'];
$q = "select * from equipment where equipmentid=$id";
$res = mysqli_query($dbconn, $q) or die(mysqli_error($dbconn));
$r = mysqli_fetch_assoc($res);
$stock = $r['equipmentstock'];
//creating a detail table for a specific equipment
?>
<style>
    table {
        border: 1px solid black;
        margin-right: 20px;
    }
</style>
<h1>update Equipment</h1>
<form action="updateEquipmentProcess.php" method="POST">
    <table width=98% style="margin-top:5% ;">
        <tr>
            <td>equipment id:</td>
            <td><input type="text" name="equipmentid" value="<?php echo $id; ?>" readonly></td>
        </tr>
        <tr>
            <td>equipment name:</td>
            <td><input type="text" name="equipmentname" value="<?php echo $r['equipmentname']; ?>" readonly></td>
        </tr>
        <tr>
            <td>equipment stock: </td>
            <td><input type="number" name="stock" value="<?php echo $stock; ?>"></td>
        </tr>
        <tr>
            <td>equipment description:</td>
            <td><input type="text" maxlength="255" name="desc" value="<?php echo $r['equipmentdesc']; ?>" style="width:45% ; height:100px;"></td>
        </tr>
    </table>
    <button type="submit" name="updatebtn">Update Button</button>
</form>
<?php

?>