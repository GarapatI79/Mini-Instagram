<?php
session_start();
$uname="";
$email="";
$fname="";
$image="";
$errors = array(); 
$db = mysqli_connect('localhost','root','','insta');
//signing up
if(isset($_POST['reg_user']))
{
	$uname=mysqli_real_escape_string($db,$_POST['uname']);
   $text=mysqli_real_escape_string($db,$_POST['image_text']);
	$email=mysqli_real_escape_string($db,$_POST['email']);
	$fname=mysqli_real_escape_string($db,$_POST['fname']);
	$psw=mysqli_real_escape_string($db,$_POST['psw']);
  
	//form validation
	if (empty($uname)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  //if (empty($fname)) { array_push($errors, "full name is required"); }
  if (empty($psw)) { array_push($errors, "password is required"); }

$user_check_query = "SELECT * FROM user WHERE uname='$uname' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['uname'] === $uname) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	
  	$query = "INSERT INTO user (fname,uname,psw,email,bio) 
  			  VALUES('$fname', '$uname', '$psw','$email','$text')";
  	mysqli_query($db, $query);
  	$_SESSION['uname'] = $uname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}
//logging in user
if (isset($_POST['login_user'])) {
  $uname = mysqli_real_escape_string($db, $_POST['uname']);
  $psw = mysqli_real_escape_string($db, $_POST['psw']);

  if (empty($uname)) {
  	//echo("yes");
  	array_push($errors, "Username is required");
  }
  if (empty($psw)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$psw = md5($psw);
  	$query = "SELECT * FROM user WHERE uname='$uname' AND psw='$psw'";
  	$results = mysqli_query($db, $query);
  	echo($query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['uname'] = $uname;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>