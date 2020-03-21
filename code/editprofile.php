<?php
session_start();
$db=mysqli_connect('localhost','root','','insta');
$uname=$_SESSION['uname'];
$bio='Bio';
if(isset($_POST['upload']))
{
  
   $text=mysqli_real_escape_string($db,$_POST['bio']);
  $email=mysqli_real_escape_string($db,$_POST['email']);
  $fname=mysqli_real_escape_string($db,$_POST['fname']);
  //form validation
    $query = "UPDATE user SET fname='$fname',email='$email',bio='$text' WHERE uname='$uname'";
    mysqli_query($db, $query);
    echo "<script>alert('Saved Successfully');</script>";

}
$result = mysqli_query($db, "SELECT * FROM user WHERE uname='$uname'");
$x=mysqli_fetch_array($result);
$res = mysqli_query($db, "SELECT * FROM posts WHERE uname='$uname' ORDER BY id desc");
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
* {
  box-sizing: border-box;
}
button {
  background-color:green;
  color: white;
  padding: 30px 20px;
  margin: 14px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
@media screen and (max-width: 500px) {
  .column {
    width: 100%;
  }
}
button:hover {
  opacity: 0.8;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 24px 0;
  position: relative;

  font-color:blue;
}
img.avatar2
{
  width: 60%;
  border-radius: 100%;
}

img.avatar {
  
  width: 60%;
  border-radius: 100%;
}

.container {
  padding: 16px;
  
}
</style>
<script type="text/javascript">
$(document).ready(function(){
$('img.avatar').click(function(){
window.location.href="myprofile.php";
});

$('b.editpic').click(function(){
window.location.href="addpic.php";
});
});
</script>
</head>
<body>
          <header>
          <div class="row" style="background-color:#CC3366;padding:13px;">
          <div class="col-sm-5">
          <h2 style="color:white;">Instagram</h2></div>
          <div class="col-sm-5">
          <h2 style="color:white;">Edit Profile</h2>
          </div>
          <div class="col-sm-2">
          <?php
            
              echo "<div id='imgcontainer'>";
                echo "<img src='".$x['profilepic']."' class='avatar'>";
               echo "</div>";
           

          ?></div>
          </header>
          <main>
          <form method="post" action="editprofile.php">
          <div class="row">
            <div class="col-sm-3" style="border:2px solid white;height:500px;">
            </div>
            <div class="col-sm-6" style="border:2px solid black;margin:20px;">
                <table style="margin:50px;">
                <tr>
                    <td><?php echo "<div id='imgcontainer'>"; echo "<img src='".$x['profilepic']."'class='avatar2'>"; echo "</div>"; ?></td>
                    <td><?php echo "<b style='color:#CC3366;'>".$x['fname']."</b>";?><br><b style="color:blue" class='editpic'>Change profile Photo</b></td>
                </tr>
                <tr><td><b>Name : </b></td><td><input type="text" name="fname" value='<?php echo $x["fname"]?>'></td></tr>
                <tr><td><b>Email : </b></td><td><input type="text" name="email" value='<?php echo $x["email"]?>'></td></tr>
                <tr><td><b>bio : </b></td><td><textarea cols="40" 
        rows="4" name="bio" ><?php echo $x["bio"]?></textarea></td></tr>
                <tr><td></td><td><button type="submit" name="upload">Save</button></td></tr>
                </table>
            </div>
         
          </div>
          </form>
          </main>
</body>
</html>