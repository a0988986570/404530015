<?php
	$servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="Healthcare";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}
echo "connection Success <br>";

	$check = $_POST['checkbox'];
	
	foreach($check as $value){
		$sql = "DELETE FROM News WHERE ID = $value";
		mysqli_query($conn, $sql);
	}

	header('location: news_delete.php');
	mysqli_close($conn);
?>