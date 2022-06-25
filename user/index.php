<?php 
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
<ul>
    <li>user detail</li>
    <li>view equipment</li>
    <li>booking</li>
  </ul>
</div>
</body>
</html>




   
   


























