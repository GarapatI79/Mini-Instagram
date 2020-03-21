<?php
  session_start();
  $db=mysqli_connect('localhost','root','','insta');
   // Initialize message variable
  $msg = "";
  $uname=$_SESSION['uname'];
  if(isset($_POST['upload']))
  {
  $image=$_FILES['image']['name'];
  $target = basename($image);
  $image_text=mysqli_real_escape_string($db,$_POST['image_text']);
  $location=mysqli_real_escape_string($db,$_POST['location']);
  //$date = date('d-m-Y');
  $sql = "INSERT INTO posts (uname,image,location,bio) VALUES ('$uname','$image','$location','$image_text')";
  	// execute query
  mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  		header('location: myprofile.php');
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  
  $result = mysqli_query($db, "SELECT * FROM user WHERE uname='$uname'");
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
<form method="POST" action="postnow.php" enctype="multipart/form-data">
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
	<h1 style="color:#CC3366;">Instagram</h1>
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
	
	<h2 style="color:blue;">Post Your Photos and Share your memories with us!!!:)</h2>
	<h3 style="color:blue;">Lets make your profile more interesting!!</h3>
	
	<div class="row">
		<div class="col-sm-3">
		
		</div>
		<div class="col-sm-6">
			<?php
			    while ($row = mysqli_fetch_array($result)) {
			      echo "<div class='imgcontainer'>";
			      	echo "<img class='avatar' src= '".$row['profilepic']."' >";
			      	echo "<p>".$row['uname']."</p>";
			      echo "</div>";
			    }
			  ?>
			<form method="POST" action="postnow.php" enctype="multipart/form-data">
			<div  id='hnew'>
			<b>Location:</b><br><input type="text" name='location' placeholder="Enter Location">
		  	<input type="hidden" name="size" value="1000000">
		  	<div>
		  	  <input type="file" name="image" required>
		  	</div>
		  	<div>
		      <textarea 
		      	id="text" 
		      	cols="40" 
		      	rows="4" 
		      	name="image_text" 
		      	placeholder="Say something about this image..."></textarea>
		  	</div>
		  	<div>
		  		<button type="submit" name="upload">POST</button>
		  	</div>
		  	</div>
		  </form>
		</div>
	</div>
</div>
</body>
</html>
