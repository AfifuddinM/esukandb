<?php
// Inialize session
session_start();

// Include database connection settings
include('../include/dbconn.php');


/* capture values from HTML form */
$username = $_POST['username'];
$password = $_POST['password'];

//$username = "admin";
//$password = "a";


$sql = "SELECT username, password, level_id FROM user WHERE username= '$username' AND password= '$password'";
$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
$row = mysqli_num_rows($query);
//echo $sql;

if ($row == 0) {
	// Jump to indexwrong page
	echo "NO DATA";
} else {
	$r = mysqli_fetch_assoc($query);
	$username = $r['username'];
	//$password= $r['password'];
	$level = $r['level_id'];
	//echo($level_id);

	if ($level == 1) {
		$_SESSION['username'] = $r['username'];
		// Jump to secured page
		echo "1";
	} elseif ($level == 2) {
		$_SESSION['username'] = $r['username'];
		// Jump to secured page
		echo "user";
	} else {
	}
}

mysqli_close($dbconn);
