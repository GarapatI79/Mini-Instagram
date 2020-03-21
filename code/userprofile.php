<?php
session_start();
$db=mysqli_connect('localhost','root','','insta');
$uname=$_GET['name'];

//echo $uname;

$bio='Bio';
$result = mysqli_query($db, "SELECT * FROM user WHERE uname='$uname'");
$query = mysqli_query($db, "SELECT * FROM `user` WHERE `uname`='$uname'");
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
img.download,img.edit,img.delete{

  width: 7%;
  position:relative;  

}
.imgcolumn {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clear floats after image containers */
.imgrow::after {
  content: "";
  clear: both;
  display: table;
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
@media screen and (max-width: 500px) {
  .column {
    width: 100%;
  }
}
button:hover {
  opacity: 0.8;
}
#edit,#upload
{	
	float:left;
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
img.avatar1
{
 width: 100%;
  max-width:640px;
  height: 420px;
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

});
</script>
</head>
<body>
<header>
<div class="container-fluid">
<div class="row">
	
	<div class="col-sm-5">
	<?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='imgcontainer'>";
      	echo "<img src='".$row['profilepic']."' class='avatar'>";
      	//echo "<div class='col-sm-3'>";
      	//echo "<h3>".$row['fname']."</h3>"."<h4 style='color:gray;'>".$row['uname']."</h4>"."<h4 style='color:brown;'>".$bio."</h4>"."<h4>".$row['bio']."</h4>";
      	//echo ;
      	//echo "</div>";
      echo "</div>";
    }

  ?>
  </div>
  <div class="col-sm-4">
  <?php
  while($x=mysqli_fetch_array($query))
  {
      echo "<h3>".$x['fname']."</h3>"."<h4 style='color:gray;'>".$x['uname']."</h4>"."<h4 style='color:brown;'>".$bio."</h4>"."<h4>".$x['bio']."</h4>";
      
  }
  ?>
  </div>
 <div class="col-sm-3">
        <button onclick="location.href='home.php'">Home</button>
        <button onclick="location.href='search.php'">Go Back</button>    
    
  </div>
  </div>
  </div>
  </header>
  <main>
  <br><br>
 <div class="col" style="border:2px solid #f00;">
  <h1 style="color:blue;">Posts</h1>
  <br>
    
      <div class="imgrow">
<?php
    while ($r = mysqli_fetch_array($res)) {
      
      echo "<div id='img' class='imgcolumn'>";
        //echo "<h4>".$r['uname']."</h4>";
        //echo "<p>".$r['location']."</p>";
        echo "<img src='".$r['image']."'class='avatar1'>";
        //echo "<div class='col-sm-3'>";
        echo "<p>".$r['bio']."</p>";
        //echo ;
        //echo "</div>";
          
          echo '<a href="data:image/jpg;base64,'.base64_encode( file_get_contents($r['image']) ).'" download><img src="download.png" class="download"></a>';
        // echo '<a href="index.php?edit='. $r['id'].'" class="edit_btn"><img src="edit.png" class="edit"></a>';
        // echo '<a href="index.php?del='. $r['id'].'" class="del_btn"><img src="delete.png" class="delete"></a>';
      echo "</div>";
      //echo "</div>";
    }

  ?>
     
    </div>
 </div>
</main>


</body>
</html>