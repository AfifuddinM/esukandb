<?php
/* php& mysqldb connection file */
$user = "root"; //mysqlusername
$pass = ""; //mysqlpassword
$host = "localhost"; //server name or ipaddress
$dbname= "esukandb"; //your db name
$dbconn= mysqli_connect($host, $user, $pass, $dbname) or die(mysqli_error($dbconn));
?>