<?php 
include('../include/dbconn.php');
include ("../session.php");
session_start();

if (!isset($_SESSION['username'])) {
       header('Location: ../login');
		} 
		
?>
<?php
//navbar
include('../include/navbarAdmin.php')
?>

<h1>Add an Equipment</h1>
    <form action="saveEquipment.php" method="post">
    <input type="text" name="equipmentname" placeholder="Equipment Name" required><br><br>
    <input type="text" name="equipmentstock" placeholder="Equipment Stock" required><br><br>
    <input type="text" name="equipmentdesc" placeholder="Equipment Description" required><br><br>
    <input type="reset">
    <input type="submit" name="addEq" value="Submit">
    </form>
</body>
</html>

