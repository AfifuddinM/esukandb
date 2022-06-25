<?php 
include('../include/dbconn.php');
include ("../login/session.php");
session_start();

if (!isset($_SESSION['username'])) {
       header('Location: ../login');
		} 
		
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sidenav</title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /><link rel="stylesheet" href="./css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<nav class="navbar navbar-inverse navbar-fixed-left">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="arrow"><a href="#"><i class="fa fa-tachometer"></i><br>Dashboard</a></li>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-table" aria-hidden="true"></i><br>Tables<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Table 1</a></li>
              <li><a href="#">Table 2</a></li>
              <li><a href="#">Table 3</a></li>
              <li><a href="#">Table 4</a></li>
              <li><a href="#">Table 5</a></li>
              <li><a href="#">Table 6</a></li>
             
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-file" aria-hidden="true"></i><br>Report<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Report A</a></li>
              <li><a href="#">Report B</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-user" aria-hidden="true"></i><br>Attendance<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Team Attendance</a></li>
              <li><a href="#">User Attendance</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><br>Location</a></li>
          <li><a href="#"><i class="fa fa-line-chart"></i><br>Sales</a></li>
        </ul>

      </div>
    </div>
  </nav>
<!-- partial -->
  <div class="main">
<h1> E-Sukan Equipment Booking System</h1>
<h3>WELCOME <?php echo $_SESSION['username'];?></h3>

<div class="container">
  <br>
  <h3>Product Available</h3>
	<?php
		$query = "SELECT * FROM equipment  WHERE equipmentstock > '1' ORDER BY equipmentname";
		$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		$numrow = mysqli_num_rows($result);
	?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
		<th width="3%">No</td>
        <th width="23%">Product Name</th>       
        <th width="17%">Product Category</th>
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

<br>
  <br>
  <br>
  <h3>Product Not Available</h3>
	<?php
		$query = "SELECT * FROM product  WHERE product_status = '2' ORDER BY product_category";
		$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		$numrow = mysqli_num_rows($result);
	?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
 		<th width="3%">No</th>
        <th width="23%">Product Name</th>       
        <th width="17%">Product Category</th>
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
        <td>&nbsp;<?php echo ucwords (strtolower($row['product_name'])); ?></td>   
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
       $color="2";}
	   else{
	   echo "<tr bgcolor='#FFCC99'>"
	  ?>
         <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['product_name'])); ?></td>   
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
</div>
</body>
</html>




   
   


























