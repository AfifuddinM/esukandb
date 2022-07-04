<?php 
include ("../session.php");
session_start();

if (!isset($_SESSION['username'])) {
       header('Location: ../login');
		} 
		
?>
<?php include('../include/navbarUser.php') ?>
<!-- partial -->
  <div class="main">
<h1> E-Sukan Equipment Booking System</h1>
<h3>Welcome <?php echo $_SESSION['username'];?></h3>
<ul>
    <li>user detail</li>
    <li>view equipment</li>
    <li>booking</li>
    <li>hello world</li>
  </ul>
</div>
</body>
</html>




   
   


























