<?php
$servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="Healthcare";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}
echo "connection Success <br>";

mysqli_set_charset($conn,"utf8");
mysql_query("SET NAME utf8");

$date=$_GET["date"];
$title=$_GET["title"];
$content=$_GET["textarea"];
$SQL="INSERT INTO News(Date,Title,Content)VALUES('$date','$title','$content')";

if(mysqli_query($conn,$SQL)){
  echo"New record created Successfully";
}else{echo"Error:".$SQL."<br>".$conn->error;
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table style="border:5px #cccccc solid;" rules="all" cellpadding='5';>
    <caption>最新消息</caption>
   <tbody>
     <tr>
       <td>日期</td>
       <td>標題</td>
       <td>內容</td>
      </tr>
     <tr>
     <td><?php echo $date;?></td>
       <td><?php echo $title;?></td>
       <td><?php echo $content;?></td>
     </tr>
   </tbody>
 </table>
</body>
</html>
