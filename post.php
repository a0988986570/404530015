<?php
$host="127.0.0.1";
$user="root";
$password="2576";
$database="test";
$connect=mysqli_connect($host,$user,$password,$database);
$username = $_POST['username'];
$userPassword = $_POST['password'];
$sql = "SELECT * FROM user WHERE `username`='$username' ";
$result = mysqli_query($connect,$sql);
$array = mysqli_fetch_array($result);

if($array['password']===$userPassword){
	echo "login success";
	session_start();
	
	$_SESSION['username']=$username;
}else{
	echo"login fail";
}

?>
