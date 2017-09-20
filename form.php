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

$name=$_POST["name"];
$ID=$_POST["ID"];
$sex=$_POST["sex"];
$blood=$_POST["blood"];
$age=$_POST["age"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$textarea=$_POST["textarea"];
$SQL="INSERT INTO hostipal(姓名,身分證字號,性別,血型,年齡,地址,電話,身體狀況自我描述)VALUES('$name','$ID','$sex','$blood','$age','$address','$phone','$textarea')";
if(mysqli_query($conn,$SQL)){
  echo"New record created Successfully<br>";
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
姓名：<?php echo $name;?><br>
ID:<?php echo $ID;?><br/>
性別：<?php echo $sex?>><br>
血型：<?php echo $blood;?><br>
年齡：<?php echo $age;?><br>
地址：<?php echo $address;?><br>
電話：<?php echo $phone;?><br>
身體狀況自我描述:
<?php echo $textarea;?><br/>
</body>
</html>
