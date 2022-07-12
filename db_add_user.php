<?php

session_start();
include('./include/dbconn.php');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $telephone = $_POST['telephone'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];

  $query = "INSERT INTO user (username, email, password,gender,address,telephone,level_id) 
  			  VALUES('$username', '$email', '$password','$gender','$address','$telephone','2')";
  $result = mysqli_query($dbconn, $query);
  if ($result) {
    echo "<script>
alert('User data successfully registered');
window.location.href='index.html';
</script>";
  }
}


// ... 