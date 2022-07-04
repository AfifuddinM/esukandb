<?php 
// Include database connection settings
include('../include/dbconn.php');
include ("../session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
		
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 30%;
  padding: 15px;
  margin: 5px 0 2px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20.5%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<?php 
include("../include/navbarAdmin.php")
?>
<body>
<h3>Users' Personal Data</h3>






<?php
    $username = $_SESSION['username'];
	$query = "SELECT * FROM user";
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$numrow = mysqli_num_rows($result);
	
	  //$query = "SELECT * FROM user ORDER BY name";
	  //$result = mysqli_query($query) or die(mysqli_error());
	  //$numrow = mysqli_num_rows($result);
?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
        <th width="3%">No</td>
        <th width="26%">Name</td>       
        <th width="8%">Gender</td>
        <th width="10%">Telephone</td>
        <th width="10%">email</td>
        <th width="27%">Address</td>
        <th align="center" colspan="2">Action</td>
      </tr>
	  
      <?php
	  $color="1";
	  
	  for ($a=0; $a<$numrow; $a++) {
		$row = mysqli_fetch_array($result);
		
		if($color==1){
echo "<tr bgcolor='#FFFFCC'>"
	  
      ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['username'])); ?></td>   
        <td>&nbsp;<?php if ($row['gender']==1){ echo 'Male'; }else{ echo 'Female'; } ?></td>
        <td>&nbsp;<?php echo $row['telephone']; ?></td>
        <td>&nbsp;<?php echo $row['email']; ?></td>
        <td><?php echo ucwords (strtolower($row['address'])); ?></td>
        <td width="5%"><a class="one" href="user.php?site=01_02&user=<?php echo $row['username'];?>">Edit</a></td>
        <td width="5%" align="center"><a class="one" onclick='javascript:confirmationDelete($(this));return false;' href="#.php?id=<?php echo $row['username'];?>" style="color:red ;">Delete</a></td>
      </tr> 
      <?php 
       $color="2";}
	   else{
	   echo "<tr bgcolor='#FFCC99'>"
	  
       ?>
       <td>&nbsp;<?php echo $a+1; ?></td>
       <td>&nbsp;<?php echo ucwords (strtolower($row['username'])); ?></td>   
       <td>&nbsp;<?php if ($row['gender']==1){ echo 'Male'; }else{ echo 'Female'; } ?></td>
       <td>&nbsp;<?php echo $row['telephone']; ?></td>
       <td>&nbsp;<?php echo $row['email']; ?></td>
       <td><?php echo ucwords (strtolower($row['address'])); ?></td>
       <td width="5%"><a class="one" href="user.php?site=01_02&user=<?php echo $row['username'];?>">Edit</a></td>
       <td width="5%" align="center"><a class="one" onclick='javascript:confirmationDelete($(this));return false;' href="#.php?id=<?php echo $row['username'];?>" style="color:red ;">Delete</a></td>
     </tr> 
     <?php 
	    $color="1";
	   }
	  } 
	  if ($numrow==0)
	  	{
		 echo '<tr>
    				<td colspan="8"><font color="#FF0000">No record avaiable.</font></td>
 			   </tr>'; 
		}
	  ?>
    </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>



   
   
</div>
   
</body>
</html> 


























