<?php
$host='localhost';
$user='root';
$pass='';
mysql_connect($host,$user,$pass);
mysql_select_db('insta');
$imagename=$_FILES["myfile"]["name"];
$imagetmp=addslashes (file_get_contents($_FILES['myfile']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO user (profilepic) VALUES('$imagetmp')";

mysql_query($insert_image);

?>