<?php
session_start();
?>

<?php
$servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="user";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}
echo "connection Success <br>";
mysqli_set_charset($conn,"utf8");
mysql_query("SET NAME utf8");

                                                   
$name=$_POST["your_account"];                                 
$password=$_POST["your_password"];                      

$sql="select `ID`,`passeord` from user where ID='$name' and Passeord='$password'";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0){
$_SESSION['session_account']=$name;                      
$_SESSION['session_password']=$password; 
  echo"login";
}else{echo"Error:".$sql."<br>".$conn->error;
}
mysqli_close($conn);

?>