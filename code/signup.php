<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title style="color:CC3366">Instagram</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: green;
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

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar,input.avatar {
  
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 5px;
}

span.psw {
  float: right;
  padding-top: 16px;
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

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</head>
<div class="container-fluid">
<div class="row">
<div class="col-sm-4" style="background-color:#CC3366"> </div>
<div class="col-sm-4" style="background-color:lavender;">
<form method="post" action="signup.php">
<?php include('errors.php'); ?>
<div class="imgcontainer">
<h1>Instagram</h1>
<img class="avatar" src="profile.png">
</div>
<div class="container">
<label for="email"><b>Email</b></label>
      
      <input type="text" placeholder="Enter email" name="email" required value="<?php echo $email; ?>">
<label for="fname"><b>Full Name</b></label>
      <input type="text" placeholder="Enter full name" name="fname" requiredvalue="<?php echo $fname; ?>">
<label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter username" name="uname" required
      value="<?php echo $uname; ?>">
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <div>
      <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="Add your bio..."></textarea>
    </div>
        
      <button type="submit" name="reg_user">Signup</button>
      <label>
         <p>Already have an account?<a href="login.php">Log in</a>
      </label>
</div>
</form>
</div>
<div class="col-sm-4" style="background-color:#CC3366"></div>
</div>
<body>
</html>