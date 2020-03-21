<?php
  session_start();
  $db=mysqli_connect('localhost','root','','insta');
  $msg="";
  //$image="addpic.png";
  $uname=$_SESSION['uname'];
  if(isset($_POST['upload']))
  {
  	$image=$_FILES['image']['name'];
  	//echo($image);
  	// image file directory
  	$target = basename($image);

  	$sql = "UPDATE user
SET profilepic = '$image'
WHERE uname= '$uname' ";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  		$_SESSION['profile']=$image;
  		header('location: myprofile.php');
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  
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
  
  width: 25%;
  border-radius: 50%;
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
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>
<body>
<form method="POST" action="addpic.php" enctype="multipart/form-data">
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
	<div class="imgcontainer">
	<h1 style="color:blue;">Instagram</h1>
	</div>
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
	<div class="container">
	<h3 style="color:blue;">Lets make your profile more interesting!!</h3>
	</div>
	<div class="row">
		<div class="col-sm-3">
		
		</div>
		<div class="col-sm-6">
			<div class="container">
			<input type="hidden" name="size" value="1000000">
			<div class="imgcontainer">
  		<?php
            
              echo "<div id='imgcontainer'>";
                echo "<img src='".$x['profilepic']."' class='avatar'>";
               echo "</div>";
           

          ?></div>
			<input type='file' name="image" onchange="readURL()">
			<button name="upload">Add/Change Profile Pic</button>
			</div>
			<br>
			<a href="myprofile.php"><h3>Skip and go forward<h3></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
