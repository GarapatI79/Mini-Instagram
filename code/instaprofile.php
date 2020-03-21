<?php
session_start();
$db=mysqli_connect('localhost','root','','insta');
$uname=$_SESSION['uname'];
$bio='Bio';
$result = mysqli_query($db, "SELECT * FROM user WHERE uname='$uname'");
$res = mysqli_query($db, "SELECT * FROM posts WHERE uname='$uname' ORDER BY id desc");
?>
<!DOCTYPE html>
<html>
<head
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="instaprofile.css">
</head>
<body>
<header>

	<div class="container">

		<div class="profile">

			<div class="profile-image">

				<?php
			    while ($row = mysqli_fetch_array($result)) {
			     	echo "<img class='avatar' src= ".$row['profilepic']." >";
			    }
			  ?>
			</div>

			<div class="profile-user-settings">

				<h1 class="profile-user-name"><?php
			    while ($row = mysqli_fetch_array($result)) {
			     	echo $row['uname'];
			    }
			  ?></h1>

				<button class="btn profile-edit-btn">Edit Profile</button>

				<button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>

			</div>

			<div class="profile-stats">

				<ul>
					<li><span class="profile-stat-count"></span> posts</li>
				</ul>

			</div>

			<div class="profile-bio">

				<p><span class="profile-real-name"><?php
			    while ($row = mysqli_fetch_array($result)) {
			     	echo $row['fname'];
			    }
			  ?></span> <?php
			    while ($row = mysqli_fetch_array($result)) {
			     	echo $row['bio'];
			    }
			  ?></p>

			</div>

		</div>
		<!-- End of profile section -->

	</div>
	<!-- End of container -->

</header>

<main>

	<div class="container">

		<div class="gallery">

			<div class="gallery-item" tabindex="0">

				<?php
    while ($r = mysqli_fetch_array($res)) {
        echo "<h4>".$r['uname']."</h4>";
        echo "<p>".$r['location']."</p>";
      	echo "<img src='".$r['image']."'class='avatar1'>";
      	echo "<p>".$r['bio']."</p>";
      	echo "<img src='download.png' class='download'>   <img src='edit.png' class='edit'>   <img src='delete.png' class='delete'>";
      
      	
    }

  ?>

			</div>

			
		</div>
		<!-- End of gallery -->

		<div class="loader"></div>

	</div>
	<!-- End of container -->

</main>
</body>
</html>