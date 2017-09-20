<?php
session_start();
?>

<?php
$servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}


mysqli_set_charset($conn,"utf8");
mysql_query("SET NAME utf8");

$id=$_GET["id"];
$date=$_GET["date"];
$title=$_GET["title"];
$content=$_GET["textarea"];
$SQL="INSERT INTO information(ID,Date,Title,Content)VALUES('$id','$date','$title','$content')";

if(mysqli_query($conn,$SQL)){
  
}else{echo"Error:".$SQL."<br>".$conn->error;
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Select</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table {
            margin-left:auto; 
            margin-right:auto;
        }
        #submit {
        	margin-top: 10px;
        }
    </style>
</head>
<body>

<?php
	$servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}


if(isset($_SESSION['name'])){
	$sql = "SELECT ID, Date, Title, Content FROM information"; // select語法
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) { //如果select的資料大於0筆

	    echo '<body background="http://imgapi.nownews.com/?w=640&q=60&src=http%3A%2F%2Fs.nownews.com%2Fa9%2Fde%2Fa9de27f1a9ae61e70a74dd92c37a29bf.JPG" text="black">
	    <center><h1>Delete</h1></center>
	    <form method="post" action="finalprojectback1.php">
		    <table bgcolor="white">
			    <tr>
					<th colspan="5" style="font-size:25px;">最新消息</th>
				</tr>
				<tr>
				    <th>編號</th>
					<th>日期</th>
					<th>標題</th>
					<th>內容</th>
					<th>刪除</th>
				</tr>';

		while($row = mysqli_fetch_assoc($result)) {
        	echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["Content"]. "</td>".
        	'<td><input type="checkbox" name="checkbox[]" value='.$row["ID"].' /></td></tr>';
	    }

	    echo "</table>";
	    echo '<center><input type="submit" value="送出" id="submit"/></center>';
	   	echo "</form>";
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);}
	else{
		echo"無權使用此頁面";
		header("Refresh: 2; url=finalproject.php");
	}
?>

</body>
</html>


