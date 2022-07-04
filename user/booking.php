<?php
include("../include/dbconn.php");
include("../session.php");
session_start();
$equipmentID=$_GET['id'];
if (!isset($_SESSION['username'])) {
    header('Location: ../login');
     } 
     
include("../include/navbarUser.php");
?>
<head>
    <title>Search Equipment</title>
</head>

<?php
if(isset($_POST['book'])){
$booktype=$_POST['bookType'];
if($booktype==1){
  echo"you picked one!";
  echo $equipmentID;$id = $_GET['id'];
$q="select * from equipment where equipmentid=$id";
$res=mysqli_query($dbconn, $q) or die(mysqli_error($dbconn));
$r=mysqli_fetch_assoc($res);
//creating a detail table for a specific equipment
?>

<table class="detailEq">
<tr>
    <th>Equipment Id</th>
    <th>Equipment Name</th>
    <th>Equipment Stock</th>
    <th>Equipment Description</th>
</tr>
</table>
<?php
echo "ID : ".$r['equipmentid']."<br>\n";
echo "Name : ".$r['equipmentname']."<br>\n";
echo "Description : ".$r['equipmentdesc']."<br>\n";
echo "Size : ".$r['equipmentstock']."<br>\n";

}
else if($booktype==2){
  echo"you picked two!";
}
}
?>