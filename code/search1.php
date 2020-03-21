<?php
session_start();
$db=mysqli_connect('localhost','root','','insta');
$uname=$_SESSION['uname'];
$bio='Bio';
$result = mysqli_query($db, "SELECT * FROM user WHERE uname='$uname'");
$x=mysqli_fetch_array($result);
if(isset($_GET['search'])){
$search=$_GET['search'];
$sql=mysqli_query($db,"INSERT INTO search (uname,search) VALUES ('$uname','$search')");
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
.imgcolumn
{
	border: 5px solid ;
	background-color:lightgray;
  	margin: 30px;
  	position:relative;
    
    cursor:pointer;
    max-width:60%;
    max-height:45%;
    display:table;
    padding:20px;
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
  width: 40%;
  border-radius: 100%;
}

img.avatar1
{
 width: 100%;
  max-width:640px;
  height: 420px;
   
   
}
img.download,img.edit,img.delete{

  width: 7%;
  position:relative;  

}
img.avatar,img.avatarn {
  
  width: 30%;
  border-radius: 100%;
}

.container {
  padding: 16px;
  
}
input[type=text] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
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
         	<form>
			  <input type="text" name="search" placeholder="Search..">
			</form>
          </div>
          <div class="col-sm-2">
          <?php
            
              echo "<div id='imgcontainer'>";
                echo "<img src='".$x['profilepic']."' class='avatar'>";
               echo "</div>";
        

          ?></div>
          </header>
          <main>
    
			          
			<?php   if(isset($_GET['search']))
				{
					$search = $_GET['search'];
					if($search[0]=='#')
					{
						$an=mysqli_query($db,"SELECT COUNT(*) AS total FROM `search` WHERE `search`='$search'");
						$data=mysqli_fetch_assoc($an);
			    		echo "<p>This hashtag was searched for ".$data['total']."</p>";}
					echo "<div class='row'>";
						echo "<div class='col-sm-3' style='border:4px solid blue;height:auto;'>";
						echo "<h3 style='color:brown;'>USERS</h3>";
								$sql = "SELECT * FROM `user` WHERE `uname` LIKE '%$search%' OR `fname` LIKE '%$search%'";
								$query = mysqli_query($db,$sql);
								
								if($query){
								while ($row = mysqli_fetch_array($query))
								{	
									
									echo "<div class='imgcontainer'>";
									echo "<img src='".$row['profilepic']."'class='avatar2'>";
									echo "<a href='userprofile.php?name=".$row['uname']."'>  <b style='color:#CC3366;' onclick='nextpage();'>".$row['fname']."</b></a>";
									echo "</div>";
									//$_SESSION['other']=$row['uname'];
									//echo $_SESSION['other'];
								
								}
							}
								
						echo "</div>";
						echo "<div class='col' style='border:4px solid red;'>";
						echo "<h3 style='color:brown;'>POSTS</h3>";
								$sql = "SELECT * FROM `posts` WHERE `bio` LIKE '%$search%' OR `location` LIKE '%$search%' ORDER BY id desc";
								$query = mysqli_query($db,$sql);
								while ($r = mysqli_fetch_array($query)) {
								$y=$r['uname'];
								$res = mysqli_query($db,"SELECT * FROM `user` WHERE `uname`='$y'");
								$row=mysqli_fetch_array($res);
						      echo "<div id='img' class='imgcolumn'>";
						        echo "<img src='".$row['profilepic']."'class='avatarn'>   <a href='userprofile.php?name=".$row['uname']."'><b style='color:#CC3366;' onclick='nextpage();'>".$row['fname']."</b></a><p style:'margin-left:100px'>".$r['location']."</p>";
						        echo "<img src='".$r['image']."'class='avatar1'><br>";
						        echo "<figcaption><b>  ".$r['uname']."  </b><p style='color:blue;'>".$r['bio']."</p></figcaption>";
						      
						      echo '<a href="data:image/jpg;base64,'.base64_encode( file_get_contents($r['image']) ).'" download><img src="download.png" class="download"></a>';
          echo "</div>";
      						    }
								}
								
						echo "</div>";
					echo "</div>";
					
				?>
          </main>
          
</body>
</html>