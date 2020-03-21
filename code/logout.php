<!DOCTYPE html>
<html>
<head>
	<title>PictoFarm</title>
</head>
<body>
	<?php

		session_start();

		session_unset();
		print_r($_SESSION);
		header("Location:login.php");

	?>

</body>
</html>