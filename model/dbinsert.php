<?php

$username="";
$password="";
$email="";
$address="";
$phone="";
$gender="";
function register($username,$password,$email,$address,$phone,$gender){
$mysqli = new mysqli('localhost','root','','hms');
if($mysqli->connect_errno){
echo $mysqli->connect_error;
} else {
	$sql = "INSERT INTO pharmacists (username,password,email,address,phone,gender) VALUES('$username','$password','$email','$address','$phone','$gender')";
	$result = $mysqli->query($sql);
	if(!$result){
		echo "Query Failed. ".$mysqli->error;
	} else {
		echo "Successfully Inserted. ".$mysqli->affected_rows." Records";
	}
}}
?>