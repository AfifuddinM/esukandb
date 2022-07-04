<?php 
include('../include/dbconn.php');
include ("../session.php");
session_start();
    if(isset($_POST['addEq'])){
        $equipmentName = $_POST['equipmentname'];
        $equipmentStock = $_POST['equipmentstock'];
        $equipmentDesc = $_POST['equipmentdesc'];
        $query =  $q="insert into equipment(equipmentname,equipmentstock,equipmentdesc) values('$equipmentName','$equipmentStock','$equipmentDesc')";
        $q=mysqli_query($dbconn,$query);
        echo "<script>
        alert('Equipment has been added');
        window.location.href='viewEquipment.php';
        </script>";
		} 
		
?>
