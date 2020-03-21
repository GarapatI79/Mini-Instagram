<?php 
session_start();
$db=mysqli_connect('localhost','root','','insta'); 
$uname=$_SESSION['uname'];
$edit=false;
  if (isset($_GET['del'])) {
  $id = $_GET['del'];
  mysqli_query($db, "DELETE FROM posts WHERE id=$id");
  //$_SESSION['message'] = "Address deleted!"; 
  header('location: myprofile.php');
}
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    //$_SESSION['id']=$id;
    if(isset($_POST['upload']))
    {
      $id = $_GET['edit'];
       echo $id;
      //$y=$_SESSION['id'];
      //echo $y;
      $text=mysqli_real_escape_string($db,$_POST['bio']);
      $query = "UPDATE posts SET bio='$text' WHERE id='$id'";
      mysqli_query($db, $query);
      echo "<script>alert('Saved Successfully');</script>";
      header('location: myprofile.php');
    }
    $result=mysqli_query($db,"SELECT * FROM posts WHERE id='$id'");
    $x=mysqli_fetch_array($result);
  }
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
  width: 100%;
}

img.avatar {
  
  width: 60%;
  border-radius: 100%;
}

.container {
  padding: 16px;
  
}
</style>
</head>
<body>
<main>
          <form method="post">
          <div class="row">
            <div class="col-sm-3" style="border:2px solid white;height:500px;">
            </div>
            <div class="col-sm-6" style="border:2px solid black;margin:20px;">
                <table style="margin:50px;">
                <tr>
                    <td><?php echo "<div id='imgcontainer'>"; echo "<img src='".$x['image']."'class='avatar2'>"; echo "</div>"; ?></td>
                    <td><?php echo "<b style='color:#CC3366;'>".$x['bio']."</b>";?><br><b style="color:blue" class='editpic'>Change Caption</b></td>
                </tr>
                <tr><td><b>Caption : </b></td><td><textarea cols="40" 
        rows="4" name="bio" ><?php echo $x["bio"]?></textarea></td></tr>
                <tr><td></td><td><button type="submit" name="upload">Save</button></td></tr>
                </table>
            </div>
         
          </div>
          </form>
          </main>

</body>
</html>