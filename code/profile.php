<!DOCTYPE html>
<html>
<head>
<title>Account Info</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>

/* Full-width input fields */
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
  margin: 24px 0 12px 0;
  position: relative;
}

input.avatar {
  float:left;
  width: 25%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  background-color:lavender;
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
</head>
<body>
<form  method="post" action="account.php">
<div class="container-fluid">
<div class="row">

<div class="col-sm-2" style="background-color:#CC3366"></div>

<div class="col-sm-8">
<div class="container">
<h1>Instagram</h1></div>
<div class="imgcontainer">
<input type="image" onclick="document.getElementById('id01').style.display='block'" src="addpic.png" class="avatar">
<button name="edit" id="edit">Edit profile</button>

</div>
<div id="id01" class="modal">
  
  <form class="modal-content animate">
    
    <div class="container">
      
      <input type="file" id="myfile">choose from computer</input>
      <button type="submit" name="profilepic">Upload</button>
      
    </div>

</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

}
</script>
<div class="main-content">
<button onclick="openfile()" id="upload" type="submit" name="uploadimage">Post Now</button>
</div>
</div>
<div class="col-sm-2" style="background-color:#CC3366"></div>
</div>
</div>
</body>
</html>