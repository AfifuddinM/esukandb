<?php
// Inialize session
session_start();

// Include database connection settings
include('../include/dbconn.php');


	
	/* capture values from HTML form */
	$username = $_POST['username'];

	
//$username = "tina";

$sql="SELECT *FROM user WHERE username= '$username'";
$res=mysqli_query($dbconn,$sql) or die(mysqli_error($dbconn));
$r=mysqli_fetch_array($res,MYSQLI_NUM);
$json[]=$r;
echo json_encode($json,JSON_UNESCAPED_UNICODE);
mysqli_free_result($res);
mysqli_close($dbconn);


?>