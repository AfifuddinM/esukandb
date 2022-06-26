<?php 
include('../include/dbconn.php');
include ("../login/session.php");
session_start();

if (!isset($_SESSION['username'])) {
       header('Location: ../login');
		} 
		
?>
<?php
//navbar
include('../include/navbar.php')
?>
<!-- partial -->
  <div class="main">
<h1> List Of Equipments Available</h1>

<div class="container">
  <br>
  <h3>Equipment Available</h3>
	<?php
		$query = "SELECT * FROM equipment  WHERE equipmentstock > '1' ORDER BY equipmentname";
		$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		$numrow = mysqli_num_rows($result);
	?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
		<th width="4%">No</td>
        <th width="17%">Equipment ID</th>       
        <th width="23%">Equipment Name</th>
        <th width="25%">Product Size</th>
        <th width="9%">Price (RM)</th>
        <th align="center">Action</th>
      </tr>
	  
      <?php
	  $color="1";
	  
	  for ($a=0; $a<$numrow; $a++) {
		$row = mysqli_fetch_array($result);
		
		if($color==1){
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentname'])); ?></td>
        <td>&nbsp;
					<?php 
					if ($row['product_category']==1) 
						echo "Hot";
					else
						echo "Cold";
			?>
		</td>   
        <td>&nbsp;
			<?php 
					if ($row['product_size']==1) 
						echo "Large";
					else
						echo "Medium";
			?>		
		</td>    
        <td>&nbsp;<?php echo $row['equipmentstock']; ?></td>
        <td width="5%" align="center"><a class="one" href="detail_product.php?id=<?php echo $row['product_id'];?>">Detail</a></td>
       </tr> 
      <?php 
       $color="2";}
	   else{
	   echo "<tr bgcolor='#FFCC99'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['equipmentdesc'])); ?></td>   
        <td>&nbsp;
					<?php 
					if ($row['product_category']==1) 
						echo "Hot";
					else
						echo "Cold";
			?>
		</td>   
        <td>&nbsp;
			<?php 
					if ($row['product_size']==1) 
						echo "Large";
					else
						echo "Medium";
			?>		
		</td>   
        <td>&nbsp;<?php echo $row['product_price']; ?></td>
        <td width="5%" align="center"><a class="one" href="detail_product.php?id=<?php echo $row['product_id'];?>">Detail</a></td>
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
</html>




   
   


























