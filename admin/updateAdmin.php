<?php
include('../include/dbconn.php');
include("../session.php");
session_start();
//navbar
include('../include/navbarAdmin.php');
$username = $_SESSION['username'];
$q = "select * from user where username ='$username' ";
$res = mysqli_query($dbconn, $q) or die(mysqli_error($dbconn));
$r = mysqli_fetch_assoc($res);
//creating a detail table for a specific equipment
?>
<style>
    table {
        border: 1px solid black;
        margin-right: 20px;
    }
</style>
<h1>update Profile</h1>
<form action="updateAdminProcess.php" method="POST">
    <table width=98% style="margin-top:5% ;">
        <tr>
            <td>Admin id:</td>
            <td><input type="text" name="userid" value="<?php echo $r['user_id']; ?>" readonly></td>
        </tr>
        <tr>
            <td>username:</td>
            <td><input type="text" name="username" value="<?php echo $r['username']; ?>" readonly></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><input type="text" name="Gender" value="<?php 
            if($r['gender']==1){
                echo "Male";
            }else
                echo "Female";
            ?>" readonly></td>
        </tr>
        <tr>
            <td>Phone Number: </td>
            <td><input type="text" name="telephone" value="<?php echo $r['telephone']; ?>"></td>
        </tr>

        <tr>
            <td>Email Address:</td>
            <td><input type="text" name="email" value="<?php echo $r['email']; ?>"></td>
        </tr>
        <tr>
            <td>Home Address:</td>
            <td><input type="text" maxlength="255" name="address" value="<?php echo $r['address']; ?>" style="width:45% ; height:100px;"></td>
        </tr>
    </table>
    <button type="submit" name="updatebtn">Update Button</button>
</form>
<?php

?>