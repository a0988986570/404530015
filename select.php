<?php
$servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="Healthcare";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}
echo "connection Success <br>";

$sql="SELECT Date,Title,Content FROM News";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		echo "[Date]".$row["Date"]."[Title]".$row["Title"]."[Content]".$row["Content"]."<br>";
	}
}else{
		echo "0 result";
	}

mysqli_close($conn);
?>