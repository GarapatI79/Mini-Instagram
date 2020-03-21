<?php
	session_start();
	include_once("dbConfig.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Instagram</title>
	</head>
<body>
		<div class="container">
			<div class="header">
				<?php include_once("header.php"); ?>
			</div>

			<div class="navigation">
				<?php include_once("navigation.php"); ?>
			</div>

			<div class="content">
				<?php
				//ACTIVITY PERFORM...
                      if(isset($_GET['activity'])){
					$activity = $_REQUEST['activity'];

					switch ($activity) {
						case 'dashboard':
							include_once("editprofile.php");
							break;

						case 'search':
							include_once("search.php");
							break;
						case 'postnow':
							include_once("post.php");
							break;
						case 'logout':
							include_once("logout.php ");
							break;
						default:
							# code...
							break;
					}
					  }
				?>
			</div>

			
			<div class="footer">
				<?php include_once("footer.php"); ?>
			</div>
		</div>
	</body>
</html>