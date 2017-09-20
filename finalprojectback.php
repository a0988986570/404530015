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

                                                   
$name=$_POST["your_account"];                                 
$password=$_POST["your_password"];                      

$sql="select `name`,`password` from login where name='$name' and password='$password'";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0){

$_SESSION['name']=$name;                      
$_SESSION['password']=$password; 
 echo'<body background="http://img.chinatimes.com/newsphoto/2016-08-13/656/20160813002547.jpg" text="white">
 <h1><center>Increase Knews</center></h1>
<form action="finalprojectback2.php"method="get">
<center>
ID:<input type="text" name="id">
<br>
date:<input type="date" name="date" placeholder="2014-09-18">
<br>
title:<input type="text" name="title">
<br>
content:
<textarea name="textarea" rows="5" cols="30">       
</textarea>
<br>
<input type="submit" value="increase knews" >
<input type="reset" value="reset" >
</center></body>'
;
 
}else{
echo "你沒有這個權限"; 
header("Refresh: 2; url=finalproject.php" );//兩秒之後跳轉到登入頁面 
}
mysqli_close($conn);
?>


