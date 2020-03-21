<?php
session_start();
$db=mysqli_connect('localhost','root','','insta');
$uname=$_SESSION['uname'];
$result = mysqli_query($db, "SELECT * FROM user WHERE uname='$uname'");
$x=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Instagram</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body
{
  background-image: url('large1.png');
  background-repeat: no-repeat;
  background-attachment:fixed;
  background-position: center;

}
input[type=file] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
/* Set a style for all buttons */
button {
  background-color:green;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}
#edit,#upload
{	
	float:right;
	top:200px;
	width:50%;
	
	
}
/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 24px 0;
  position: relative;
  font-color:blue;
}

img.avatar {
  
  width:20%;
  border-radius: 100%;
}

.container {
  padding: 16px;
  
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 50%; /* Full width */
  height: 50%; /* Full height */
  padding-top:20px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 60%; /* Could be more or less, depending on screen size */
}
/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<script>
function myprofile()
{
	location.href='addpic.php';
}
function search()
{
	location.href='search1.php';

}
function myfeed()
{
	location.href='feed1.php';

}
function logout()
{
	location.href='logout.php';
}
</script>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-1" style="border: 5px solid #405de6;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #5851db;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #833ab4;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #c13584;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #e1306c;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #fd1d1d;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #fd1d1d;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #e1306c;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #c13584;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #833ab4;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #5851db;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #405de6;">
		</div>
	</div>
	<header>
	<div class="row">
	<div class="col-sm-5">
	<?php
            
             // echo "<div id='imgcontainer'>";
                echo "<img src='".$x['profilepic']."' class='avatar'>";
                echo "<b style='margin:20px;'>".$x['fname']."</b>";
              // echo "</div>";
           

          ?></div>
          <div class="col-sm-3">
	<div class="imgcontainer">
	<h1 style="color:blue;">Instagram</h1></div>
	</div>
          </div></header>
		<div class="row">
		<div class="col-sm-1" style="border: 5px solid #405de6;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #5851db;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #833ab4;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #c13584;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #e1306c;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #fd1d1d;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #fd1d1d;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #e1306c;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #c13584;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #833ab4;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #5851db;">
		</div>
		<div class="col-sm-1" style="border: 5px solid #405de6;">
		</div>
	</div>
	<div class="row">
	<div class="col-sm-3">
			<div class="container">
			<button onclick="myfeed()">Feed</button>
			<br>
			<br>
			<button onclick="search()">Search</button>			
			</div>
			</div>
			<div class="col-sm-6">
			<h1 style="color:blue;">  Welcome to instagram <?php echo($_SESSION['uname']) ?></h1>
			</div>
			<div class="col-sm-3">
			<div class="container">
			<button onclick="myprofile()">My Account</button>
			<br>
			<br>
			<button onclick="logout()">Logout</button>
			</div>
			</div>
	</div>
</div>
</body>
</html>