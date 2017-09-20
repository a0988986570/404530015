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
  
}else{echo "你沒有這個權限"; 
header("Refresh: 2; url=finalproject.php" );//兩秒之後跳轉到登入頁面 
}
mysqli_close($conn);
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
$SQL="UPDATE information Set Date='$date',Title='$title',Content='$content'WHERE ID='$id'";
if(mysqli_query($conn,$SQL)){
  
}else{echo"Error:".$SQL."<br>".$conn->error;
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pages</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table {
            margin-left:auto; 
            margin-right:auto;
        }
    </style>
</head>
<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKmpzc0gBqfOrQqsRHbxbVRu4AGhjH78Cv-up_tqYjqzWfRYtc" text="black" >
    <?php
        $servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}


        $sql = "SELECT * FROM information ORDER BY 'ID'"; //SQL 語法
        $result = mysqli_query($conn, $sql) or die("Error");

        $data_nums = mysqli_num_rows($result); //統計總比數
        $per = 5; //每頁顯示項目數量
        $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
        if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
            $page=1; //則在此設定起始頁數
        } else {
            $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
        }
        $start = ($page-1)*$per; //每一頁開始的資料序號
        $result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");
    ?>

    <table bgcolor="white">
        <tr>
            <th colspan="4" style="font-size:25px;">最新消息</th>
        </tr>
        <tr>
            <th>編號</th>
            <th>日期</th>
            <th>標題</th>
            <th>內容</th>
        </tr>

    <?php
        //輸出資料內容
        while ($row = mysqli_fetch_array ($result))
        {
            $ID = $row['ID'];
            $DATE = $row['Date'];
            $TITLE = $row['Title'];
            $CONTENT = $row['Content'];
        
            echo '
            <tr>
                <td>'. $ID .'</td>
                <td>'. $DATE .'</td>
                <td>'. $TITLE .'</td>
                <td>'. $CONTENT .'</td>
            </tr>';
        }
    ?>
    
    </table>

    <br/>
    
    <center>
    <?php
        //分頁頁碼
        echo "<br /><a href=?page=1>首頁</a> ";
        
        for( $i=1 ; $i<=$pages ; $i++ ) {
            if ( $page-5 < $i && $i < $page+5 ) {
                echo "<a href=?page=".$i.">".$i."</a> ";
            }
        } 
        echo "<a href=?page=".$pages.">末頁</a>，第". $page ."頁/共". $pages ."頁<br/>";

        echo '共 '.$data_nums.' 筆<br>';
        echo '<a href="logout.php">登出</a>  <br><br>';
    ?>