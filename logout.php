<?php session_start(); ?>

<?php
	$servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}
echo "connection Success <br>";
unset($_SESSION['name']);
echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=finalproject.php>';
?>