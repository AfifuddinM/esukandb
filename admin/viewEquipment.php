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
<!-- partial -->
  <div class="main">
<h1> List Of Equipments Available</h1>

<div class="container">
  <br>
  <h3>Equipment Available</h3>
	<?php
		$query = "SELECT * FROM equipment  WHERE equipmentstock > '1' ORDER BY equipmentid";
		$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		$numrow = mysqli_num_rows($result);
	?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border: radius 2px;">
      <tr align="left" bgcolor="#272c33" style="color:white ;">
		<th width="4%">No</td>
        <th width="17%">Equipment ID</th>       
        <th width="23%">Equipment Name</th>
        <th width="9%">Equipment Stock</th>
        <th width="25%">Equipment Desc</th>
        <th align="center" colspan="2" style="text-align:center ;">Action</th>
      </tr>
	  
      <?php
	  $color="1";
	  
	  for ($a=0; $a<$numrow; $a++) {
		$row = mysqli_fetch_array($result);
		
		if($color==1){
			echo "<tr bgcolor='#c8c9ce'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentid'])); ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentname'])); ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentstock'])); ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentdesc'])); ?></td>
		</td>    
        <td width="5%" align="center"><a class="one" href="updateEquipment.php?id=<?php echo $row['equipmentid'];?>">Update</a></td>
        <td width="5%" align="center"><a class="one" href="deleteEquipment.php?id=<?php echo $row['equipmentid'];?>" style="color:red ;">Delete</a></td>
       </tr> 
      <?php 
       $color="2";}
	   else{
	   echo "<tr bgcolor='#FFFFFF'>"
	  ?>
       <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentid'])); ?>
         
      </td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentname'])); ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentstock'])); ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentdesc'])); ?></td>
		</td>    
    <td width="5%" align="center"><a class="one" href="updateEquipment.php?id=<?php echo $row['equipmentid'];?>">Update</a></td>
        <td width="5%" align="center"><a class="one" onclick='javascript:confirmationDelete($(this));return false;' href="deleteEquipment.php?id=<?php echo $row['equipmentid'];?>" style="color:red ;">Delete</a></td>
       </tr> 
	   <?php
	    $color="1";
	   }
	  } 
	  if ($numrow==0)
	  	{
		 echo '<tr>
    				<td colspan="8"><font color="#FF0000">No record available.</font></td>
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
</div>
</body>
<script>
  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>
</html>




   
   


























