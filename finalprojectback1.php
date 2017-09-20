<?php
	$servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}
echo "connection Success <br>";

	$check = $_POST['checkbox'];
	
	foreach($check as $value){
		$sql = "DELETE FROM information WHERE ID = $value";
		mysqli_query($conn, $sql);
	}

	header('location: finalprojectback3.php');
	mysqli_close($conn);
?>