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
$dbname="Healthcare";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}
echo "connection Success <br>";

	$sql = "SELECT ID, Date, Title, Content FROM News"; // select語法
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) { //如果select的資料大於0筆

	    echo '
	    <center><h1>Delete</h1></center>
	    <form method="post" action="delete.php">
		    <table>
			    <tr>
					<th colspan="4" style="font-size:25px;">最新消息</th>
				</tr>
				<tr>
					<th>日期</th>
					<th>標題</th>
					<th>內容</th>
					<th>刪除</th>
				</tr>';

		while($row = mysqli_fetch_assoc($result)) {
        	echo "<tr><td>" . $row["Date"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["Content"]. "</td>".
        	'<td><input type="checkbox" name="checkbox[]" value='.$row["ID"].' /></td></tr>';
	    }

	    echo "</table>";
	    echo '<center><input type="submit" value="送出" id="submit"/></center>';
	   	echo "</form>";
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);
?>

</body>
</html>