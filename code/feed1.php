<?php
session_start();
$db=mysqli_connect('localhost','root','','insta');
$uname=$_SESSION['uname'];
$bio='Bio';
$result = mysqli_query($db, "SELECT * FROM user WHERE uname='$uname'");
$query = mysqli_query($db, "SELECT * FROM user WHERE uname='$uname'");
$x=mysqli_fetch_array($query);
$res = mysqli_query($db, "SELECT * FROM posts  ORDER BY id desc");
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
.imgcolumn
{
	border: 5px solid ;
	background-color:purple;
  	margin: 30px;
  	position:relative;
    
    cursor:pointer;
    max-width:70%;
    max-height:45%;
    display:table;
    padding:20px;
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
  height: 450px;
   
}
img.download,img.edit,img.delete{

  width: 7%;
  position:relative;  

}
img.avatar {
  
  width: 20%;
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
});
</script>
</head>
<body>
<header>

<div class="row" style="background-color:#CC3354;padding:20px;color:white;">
	<div class="col-sm-5"><h1>Instagram</h1></div>
	<div class="col-sm-4"><h1 style="font-family:cursive; font-style:Snell Roundhand;">Feed</h1></div>
	<div class="col-sm-3">
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
    </header>
  </div>
  <main>
 <div class="row">
 <div class="col-sm-3">
        <button onclick="location.href='home.php'">Home</button>
        <button onclick="location.href='logout.php'">Logout</button>    
    
  </div>

 <div class="col-sm-8" style="border:2px solid white;color:white;">   
      <div class="imgrow">
<?php
    while ($r = mysqli_fetch_array($res)) {
      
      echo "<div id='img' class='imgcolumn'>";
        $y=$r['uname'];
        $new = mysqli_query($db,"SELECT * FROM user WHERE uname='$y'");
        $get=mysqli_fetch_array($new);
        echo "<img src='".$get['profilepic']."'class='avatar'>   <a href='userprofile.php?name=".$get['uname']."'><b style='color:white;' onclick='nextpage();'>".$get['fname']."</b></a>        <br><b style:'margin-left:100px'>".$r['location']."</b>";
        echo "<img src='".$r['image']."'class='avatar1'><br>";
        //echo "<div class='col-sm-3'>";
        echo "<figcaption><b>  ".$r['uname']."  </b><p style='color:white;'>".$r['bio']."</p></figcaption>";
        //echo ;
        //echo "</div>";
      
      echo '<a href="data:image/jpg;base64,'.base64_encode( file_get_contents($r['image']) ).'" download><img src="download.png" class="download"></a>';
        echo "</div>";
      
      //echo "</div>";
    }

  ?>
  	
    </div> 
    </div>
 </div>
</main>


</body>
</html>