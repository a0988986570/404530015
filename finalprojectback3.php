
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

if(isset($_SESSION['name'])){
  
 $sql = "SELECT * FROM information ORDER BY 'ID'"; //SQL 語法
        $result = mysqli_query($conn, $sql) or die("Error");
        echo '<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTt3jpieFJj4b7P0fGtosEqcBgkvhNM-ee_h0Zgx4rbZEhZIdjG" text="white">
	    <center><h1>Update</h1>
	    <form method="get" action="finalprojectback4.php">
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
<input type="submit" value="update knews" >
<input type="reset" value="reset" ></center>';


}else{echo "你沒有這個權限"; 
header("Refresh: 2; url=finalproject.php" );//兩秒之後跳轉到登入頁面 
}
mysqli_close($conn);
?>

